<?php
namespace IndieWeb;

function httpGet($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 1);
	$response = curl_exec($ch);
	$info = curl_getinfo($ch);
	curl_close($ch);

	$rawHeaders = mb_substr($response, 0, $info['header_size']);
	$headers = $rawHeaders;
	$body = mb_substr($response, $info['header_size']);

	return array($body, $headers, $info);
}

function parseIndieWebApp_parse_icons($name,$icons){
  $resp = array();
  if(is_array($icons)){
    foreach($icons as $icon){
      $size = substr($icon->sizes,0,strpos($icon->sizes,'x'));
      $icon_src = basename($icon->src);
      $extension = substr($icon_src,strrpos($icon_src,"."));
      $icon_src = "logo_{$size}{$extension}";
      $resp["ICON_".$size]=$icon_src;
      $target_dir = "content/02-apps/0-".strtolower($name);
      if(!file_exists($target_dir)){
          @mkdir($target_dir);
      }
      if(!file_exists("{$target_dir}/$icon_src")){
        $fileGet = httpGet($icon->src);
        $mr = fopen("{$target_dir}/$icon_src",'w');
        fputs($mr,$fileGet[0]);
        fclose($mr);
      }
    }
  }
  $resp_ = array();
  foreach($resp as $key=>$value){
    $resp_[]="{$key}: {$value}";
  }
  return array("ICONS"=>implode("\n----\n",$resp_));
}

function parseIndieWebApp_parse_categories($name,$categories){
  $os = array();
  $categories_ = array();
  if(is_array($categories)){
    foreach($categories as $category){
      $os[]=$category->name;
      if(is_array($category->subcategories)){
        foreach($category->subcategories as $cat){
          $categories_[]=$cat;
        }
      }
    }
  }
  if(!empty($os)){
    $resp["OPERATING_SYSTEMS"]=implode(",",$os);
  }
  if(!empty($categories_)){
    $categories_ = array_unique($categories_);
    $resp["CATEGORIES"]=implode(",",$categories_);
  }
  return $resp;
}
function parseIndieWebApp($file_contents){
  $appTemplate = 'template/AppTemplate.tpl';
  $manifest = json_decode($file_contents);
  $properties = array(
    'name','icons','start_url','display','orientation','description',
    'license','license_url','source_url','version','developer','wikipedia_url',
    'default_locale','protocols','categories'
    );
  $template = file_get_contents($appTemplate);
  $file = $template;
  foreach($manifest as $property => $value){
    if(in_array($property,$properties)){
      $func = __NAMESPACE__ . '\parseIndieWebApp_parse_'.$property;
      if(function_exists($func)){
        $value = $func($manifest->name,$value);
      }
    }
    if(is_string($value)){
        $file = str_replace("{{APP_".strtoupper($property)."}}",$value,$file);
    }
    if(is_array($value)){
      foreach($value as $property=>$value){
        $file = str_replace("{{APP_".strtoupper($property)."}}",$value,$file);
      }
    }
  }
  $resp = array('name'=>$manifest->name,'file'=>$file);
  return $resp;
}

$master = json_decode(file_get_contents('indie-master.json'));
if(!empty($master->apps)){
  foreach($master->apps as $app){
    echo "Processing {$app}...\n";
    $file = httpGet($app);
    $indie = parseIndieWebApp($file[0]);
    $target_dir = "content/02-apps/0-".strtolower($indie['name']);
    if(!file_exists($target_dir)){
      @mkdir($target_dir);
    }
    $mr = fopen("{$target_dir}/app.txt","w");
    fputs($mr,$indie['file']);
    fclose($mr);
    echo "\tOK\n";
  }
}
