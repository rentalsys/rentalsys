<?php
namespace app\models\dao;

use app\core\Model;

class LancamentoReceberDao extends Model{
    public function lista(){
        $sql = "SELECT l.*, c.nome FROM fin_lancamento_receber l, contato c WHERE 
                 l.id_cliente = c.id_contato
                ";
        return $this->select($this->db, $sql);                   
                
    }
    
    public function getLancamentoReceber($id_lancamento){
        $sql = "SELECT l.*, c.nome FROM fin_lancamento_receber l, contato c WHERE
                 l.id_cliente = c.id_contato AND id_lancamento_receber = $id_lancamento
                ";
        return $this->select($this->db, $sql, false);
        
    }
}

