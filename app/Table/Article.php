<?php

namespace App\Table;

use App\App;

class Article extends Table
{
    
    // Récupère les derniers articles 
    public static function getLast(){

        // return App::getDb()->query('SELECT * FROM articles', __CLASS__);
        // return App::getDb()->query('SELECT * FROM articles', 'App\Table\Article');
        return self::query("
        
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories 
                ON categorie_id = categories.id
        ");
    }

    public static function lastByCategory($categorie_id){
        return self::query("
        
            SELECT articles.id, articles.titre, articles.contenu, categories.titre as categorie 
            FROM articles 
            LEFT JOIN categories 
                ON categorie_id = categories.id
            WHERE categorie_id = ?
        ", [$categorie_id]);
    }

    public function getUrl(){      
        return 'index.php?p=article&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 100) . ' ...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';
        return $html;
    }
}
