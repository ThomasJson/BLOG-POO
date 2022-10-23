<?php

namespace App;

class Autoloader
{
    // Static car pas besoin d'instancier la classe
    static function autoload($class)
    {
        // if (strpos($class, __NAMESPACE__, '\\') === 0) {
        //     Il faut que la classe et le namespace soit en position 0
        //     Sinon la classe n'est pas propre à notre code
            
        // }
        
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        $class = str_replace('\\', '/', $class);
        require __DIR__ . '/' . $class . '.php';
        // Constante qui contient le nom du dossier parent
        // Ici le dossier app
    }

    static function register()
    {

        spl_autoload_register(array(__CLASS__, 'autoload'));
        // __CLASS__ : constante qui contient la class courante
        // spl_autoload_register(array('Autoloader', 'autoload'));
        // Nom de la classe, fonction
    }
}
