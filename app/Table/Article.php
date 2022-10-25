<?php

namespace App\Table;

class Article
{
    // Quand une variable n'est pas connue
    // Appel de cette fonction : 
    // $post->url === $post->getUrl();
    // $post->extrait === $post->getExtrait();

    public function __get($key){
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl(){      
        return 'index.php?=p=article&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->contenu, 0, 100) . ' ...</p>';
        // $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }
}
