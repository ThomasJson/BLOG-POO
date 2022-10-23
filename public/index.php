<?php

require '../app/Autoloader.php';
App\Autoloader::register();

if (isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'home';
}

// Initialisation des objets
$db = new App\Database('blog_poo');

ob_start();
// Tout ce qui affiché est stocké dans une variable : $content

if ($p === 'home') {

    require '../pages/home.php';

} elseif ($p === 'article') {

    require '../pages/single.php';

}

$content = ob_get_clean();
// Tout ce qui affiché est stocké dans une variable : $content

require '../pages/templates/default.php';
