<?php

namespace App\Table;

use App\App;

class Table
{

    protected static $table;

    private static function getTable()
    {
        // On utilise également static:: partout, 
        // Pour ne pas faire référence à cette classe 
        if (static::$table === null) {
            // static::$table = __CLASS__;
            // Ici on ne veut pas la classe en cours
            $class_name = explode('\\', get_called_class());
            static::$table = strtolower(end($class_name)) . "s";
        }

        // die(static::$table);
        return static::$table;
        // Ici, retourne 'categories'
    }

    public static function find($id)
    {
        return App::getDb()->prepare("       
            SELECT *
            FROM " . static::getTable() . "
            WHERE id = ?
        ", [$id], get_called_class(), true);
    }

    public static function query($statement, $attributes = null, $one = false)
    {

        if ($attributes) {
            return App::getDb()->prepare($statement, $attributes, get_called_class(), $one);
        } else {
            return App::getDb()->query($statement, get_called_class(), $one);
        }
    }

    public static function all()
    {
        return App::getDb()->query("       
            SELECT *
            FROM " . static::getTable() . "
        ", get_called_class());
    }

    // Quand une variable n'est pas connue
    // Appel de cette fonction : 
    // $post->url === $post->getUrl();
    // $post->extrait === $post->getExtrait();
    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
