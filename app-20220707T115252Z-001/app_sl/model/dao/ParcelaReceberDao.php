<?php
namespace app\models\dao;

use app\core\Model;

class ParcelaReceberDao extends Model{
    public function listaPorLancamento($id_lancamento){
        $sql = "SELECT * FROM fin_parcela_receber 
                WHERE id_lancamento_receber = $id_lancamento 
                ";
        return $this->select($this->db, $sql);
    }
}

