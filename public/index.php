<?php

require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

ob_start();
// Tout ce qui affiché est stocké dans une variable : $content

if ($p == 'home') {

    require '../pages/home.php';

} elseif ($p == 'article') {

    require '../pages/single.php';
} elseif ($p == 'categorie') {

    require '../pages/categorie.php';
}

$content = ob_get_clean();
// Tout ce qui affiché est stocké dans une variable : $content

require '../pages/templates/default.php';
