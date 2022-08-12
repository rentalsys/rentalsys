<?php
namespace app\models\dao;

use app\core\Model;

class ReservaDao extends Model{
    
    public function existeReserva($id_produto, $id_ordem_producao){
        $sql = "SELECT * FROM reserva WHERE id_ordem_producao = $id_ordem_producao AND id_produto =$id_produto";
        return $this->select($this->db, $sql, false);
    }
    
    public function existeReservaNoPedido($id_produto, $id_pedido){
        $sql = "SELECT * FROM reserva WHERE id_pedido = $id_pedido AND id_produto =$id_produto";
        return $this->select($this->db, $sql, false);
    }
}

