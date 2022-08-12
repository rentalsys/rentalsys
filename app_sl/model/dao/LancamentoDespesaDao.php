<?php
namespace app\models\dao;

use app\core\Model;

class LancamentoDespesaDao extends Model{
    public function lista(){
        $sql = "SELECT * FROM fin_lancamento_despesa l, fin_despesa d WHERE 
                 l.id_despesa = d.id_despesa
                ";
        return $this->select($this->db, $sql);                   
                
    }
    
    public function getLancamentoDespesa($id_lancamento){
        $sql = "SELECT * FROM fin_lancamento_despesa l, fin_despesa d WHERE
                 l.id_despesa = d.id_despesa AND id_lancamento_despesa = $id_lancamento
                ";
        return $this->select($this->db, $sql, false);
        
    }
}

