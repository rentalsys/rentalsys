<?php
namespace app\models\dao;

use app\core\Model;

class LancamentoPagarDao extends Model{
    public function lista(){
        $sql = "SELECT l.*, c.nome FROM fin_lancamento_pagar l, contato c WHERE 
                 l.id_fornecedor = c.id_contato
                ";
        return $this->select($this->db, $sql);                   
                
    }
    
    public function getLancamentoPagar($id_lancamento){
        $sql = "SELECT l.*, c.nome FROM fin_lancamento_pagar l, contato c WHERE
                 l.id_fornecedor = c.id_contato AND id_lancamento_pagar = $id_lancamento
                ";
        return $this->select($this->db, $sql, false);
        
    }
}

