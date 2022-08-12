<?php
namespace Models;

abstract class ModelConect
{

    protected function conectBD(){
        
        try{   
        $con = new \PDO("mysql:host=".SERVIDOR.";dbname=".BANCO."",USUARIO,SENHA);
        return $con;
        } catch (\PDOException $erro){
            return $erro->getMessage();
        }
    }
    
}