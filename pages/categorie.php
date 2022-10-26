<?php

use App\Table\Article;
use App\Table\Categorie;

$categorie = Categorie::find($_GET['id']);
$articles = Article::lastByCategory($_GET['id']);
$categories = Categorie::all();

?>

<div class="row">

  <div class="col-sm-8">
    <?php foreach (App\Table\Article::getLast() as $post) : ?>

      <h2>
        <a href="<?= $post->url ?>">
          <?= $post->titre; ?>
        </a>
      </h2>
      <p><em><?= $post->categorie; ?></em></p>
      <p><?= $post->extrait; ?></p>

    <?php endforeach; ?>
  </div>

  <div class="col-sm-4">
    <ul>
      <?php foreach (App\Table\Categorie::all() as $categorie) : ?>
        <li>
          <a href="<?= $categorie->getUrl() ?>">
            <?= $categorie->titre; ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

</div>