<?php snippet('header') ?>
<div class="page-body">
  <section class="listing">
    <header class="listing-header">
      <h2>Top Downloaded</h2>
    </header>
    <div class="listing-body">
  <?php

  $apps = page('apps')->children()
                      ->visible();

  snippet('apps', compact('apps'));

  ?>
    </div>
  </section>

  <section class="listing">
    <header class="listing-header">
      <h2>Top Rated</h2>
    </header>
    <div class="listing-body">
  <?php

  $apps = page('apps')->children()
                      ->visible()
                      ->shuffle();

  snippet('apps', compact('apps'));

  ?>
    </div>
  </section>
</div>
<?php snippet('footer') ?>