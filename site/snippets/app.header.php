<header class="app-header">

  <h1 class="app-title"><a href="<?php echo $app->url() ?>"><?php echo html($app->title()) ?></a></h1>
  <h2 class="app-category"><?php echo html($app->category()) ?></h2>

  <?php if($image = $app->image()): ?>
  <figure class="app-logo">
    <a href="<?php echo $app->url() ?>"><img src="<?php echo $image->url() ?>" alt="<?php echo html($app->title()) ?>"></a>
  </figure>
  <?php endif ?>

  <button class="app-install-button">Install</button>

</header>