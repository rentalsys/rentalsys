<?php
namespace app\models\dao;

use app\core\Model;

class CotacaoDao extends Model{
    public function lista(){
        $sql = "SELECT * FROM cotacao c, status_cotacao s 
                WHERE c.id_status_cotacao = s.id_status_cotacao 
                ";
        return $this->select($this->db, $sql);
    }
}

