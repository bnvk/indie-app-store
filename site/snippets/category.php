<article class="category app-header">
<?php

  $apps = array();

  foreach(page('apps')->children()->visible() as $app){
    if(in_array($category, explode(',', $app->category()->value))){
      $apps[] = $app;
    }
  }

  $headliner = $apps[0];

?>
  <?php if($image = $headliner->image()): ?>
  <figure class="app-logo">
    <a href="<?php echo $headliner->url() ?>"><img src="<?php echo $image->url() ?>" alt="<?php echo html($headliner->title()) ?>"></a>
  </figure>
  <?php endif ?>

  <div class="app-meta">
    <h1 class="app-title"><a href="<?php echo $headliner->url() ?>"><?php echo html($category) ?></a></h1>
    <h2 class="app-category">
    <?php foreach($apps as $app): ?>
      <div class="name"><?php echo html($app->title()) ?></div>
    <?php endforeach ?>
    </h2>
  </div>
</article>