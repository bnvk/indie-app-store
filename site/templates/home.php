<?php snippet('header') ?>
<h1 class="headline">Featured Apps</h1>
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
<?php snippet('footer') ?>