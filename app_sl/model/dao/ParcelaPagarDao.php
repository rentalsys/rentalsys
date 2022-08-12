<?php
namespace app\models\dao;

use app\core\Model;

class ParcelaPagarDao extends Model{
    public function listaPorLancamento($id_lancamento){
        $sql = "SELECT * FROM fin_parcela_pagar 
                WHERE id_lancamento_pagar = $id_lancamento 
                ";
        return $this->select($this->db, $sql);
    }
}

