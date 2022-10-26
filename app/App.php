<?php

namespace App;

class App
{

    const DB_NAME = 'blog_poo';
    const DB_USER = 'root';
    const DB_PASS = "";
    const DB_HOST = 'localhost';

    private static $database;

    // GETTER
    public static function getDb()
    {
        if (self::$database === null) {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$database;
    }
}
