<?php
namespace app\models\dao;

use app\core\Model;

class FornecedorDao extends Model{
    
    public function listaFornecedor(){
        $sql = "SELECT id_fornecedor, nome FROM fornecedor
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaAgendamento(){
        $sql = "SELECT * FROM fornecedor
            ORDER BY treinamento DESC, nome ASC";
        return $this->select($this->db, $sql);
    }
}
?>
