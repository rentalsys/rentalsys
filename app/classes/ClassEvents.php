<?php
namespace classes;

use Models\ModelConect;

class ClassEvents extends ModelConect{

    public function getEvents(){
        $b = $this->conectDB()->prepare("SELECT * FROM posvenda_treinamento ");
        $b->execute();
        $f=$b->fetchALL(\PDO::FETCH_ASSOC);
        return json_encode($f);
    }
    
}

