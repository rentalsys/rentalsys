<?php
namespace app\models\dao;

use app\core\Model;

class EntradaDao extends Model{
    public function listaPorData($data){
        $sql = "SELECT e.*, p.produto, l.localizacao FROM entrada e, produto p, localizacao l WHERE 
                 e.id_produto = p.id_produto and e.id_localizacao = l.id_localizacao and data_entrada = '$data'
                ";
        return $this->select($this->db, $sql);                   
                
    }
}

