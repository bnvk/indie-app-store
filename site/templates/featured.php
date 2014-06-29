<?php snippet('header') ?>
<div class="page-body">
  <section class="listing">
    <header class="listing-header">
      <h2>Featured Apps</h2>
    </header>
    <div class="listing-body">
  <?php

  // let's just show four featured apps
  // by going through the entire list of visible apps
  // and take four random ones
  $apps = page('apps')->children()
                      ->visible()
                      ->shuffle()
                      ->limit(4);

  snippet('apps', compact('apps'));

  ?>
    </div>
  </section>
</div>
<?php snippet('footer') ?>