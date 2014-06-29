<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="robots" content="noindex, nofollow" />

  <title><?php echo html($site->title() . ' / ' . $page->title()) ?></title>

  <?php echo css('assets/css/site.css') ?>

</head>
  <body>

    <header class="header cf">

      <h1 class="logo"><a href="<?php echo url() ?>"><strong>Indie</strong> App Store</a></h1>

      <nav class="menu cf" role="navigation">
      <?php foreach($pages->visible() as $item): ?>
        <a<?php e($item->isOpen(), ' class="is-active"') ?> href="<?php echo $item->url() ?>"><?php echo html($item->title()) ?></a>
      <?php endforeach ?>
      </nav>

      <input type="search" placeholder="Search...">

    </header>
