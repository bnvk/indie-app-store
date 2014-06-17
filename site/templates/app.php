<?php snippet('header') ?>

<article class="app app-details">

  <?php snippet('app.header', array('app' => $page)) ?>

  <div class="text app-text">
    <?php echo kirbytext($page->text()) ?>
    <p>
      <strong><a href="<?php echo $page->link() ?>"><?php echo $page->link() ?></a></strong>
    </p>
  </div>

</article>

<?php snippet('footer') ?>