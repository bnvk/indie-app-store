<?php snippet('header') ?>
<h1 class="headline"><?php echo html($page->title()) ?></h1>
<?php snippet('apps', array('apps' => $page->children()->visible())) ?>
<?php snippet('footer') ?>