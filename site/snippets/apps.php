<div class="apps">
  <?php foreach($apps as $app): ?>
  <article class="app">
    <?php snippet('app.header', compact('app')) ?>
  </article>
  <?php endforeach ?>
</div>