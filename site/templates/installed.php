<?php snippet('header') ?>
<div class="page-body">
  <section class="listing">
    <header class="listing-header">
      <h2>Installed Apps</h2>
    </header>
    <div class="listing-body">
  <?php

  $apps = page('apps')->children()
                      ->visible()
                      ->shuffle()
                      ->limit(1);

  snippet('apps', compact('apps'));

  ?>
    </div>
  </section>
</div>
<?php snippet('footer') ?>