<?php snippet('header') ?>
<div class="page-body">
  <section class="listing">
    <header class="listing-header">
      <h2>Categories</h2>
    </header>
    <div class="listing-body">
  <?php
                 
  $categories = array();
  $apps = page('apps')->children()->visible();

  foreach($apps as $app)
    $categories[] = $app->category()->value;

  $categories = array_unique($categories);

  ?>
      <div class="categories">
        <?php foreach($categories as $category): ?>
          <?php snippet('category', compact('category')) ?>
        <?php endforeach ?>
      </div>
    </div>
  </section>
</div>
<?php snippet('footer') ?>