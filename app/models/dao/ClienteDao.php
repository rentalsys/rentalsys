<?php
namespace app\models\dao;

use app\core\Model;

class ClienteDao extends Model{
    
    public function listaCliente(){
        $sql = "SELECT id_cliente, nome FROM cliente
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaAgendamento(){
        $sql = "SELECT * FROM cliente
            ORDER BY treinamento DESC, nome ASC";
        return $this->select($this->db, $sql);
    }
}
?>
