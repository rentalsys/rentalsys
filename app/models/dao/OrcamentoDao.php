<?php
namespace app\models\dao;

use app\core\Model;

class OrcamentoDao extends Model{
    
    public function listaCliente(){
        $sql = "SELECT id_cliente, nome FROM cliente
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function lista(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente 
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 1";
        return $this->select($this->db, $sql);
    }
    
    public function getOrcamento($id_pedido){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN fornecedor AS f ON p.id_transportadora = f.id_fornecedor
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario 
                WHERE p.id_pedido = $id_pedido";
        return $this->select($this->db, $sql, false);
    }
    
    public function getOrcamentoItem($id_pedido){
        $sql = "SELECT * FROM venda_item_pedido AS i
                INNER JOIN produto AS p ON i.id_produto = p.id_produto
                WHERE i.id_pedido = $id_pedido";
        return $this->select($this->db, $sql);
    }
    
    public function listaanexo($id_pedido){
        $sql = "SELECT * FROM venda_pedido_arquivo
                 WHERE   id_pedido = $id_pedido";
        return $this->select($this->db, $sql);
    }
    
    public function ExcluitPagamento($id_forma, $id_pedido){
        $sql = "DELETE FROM venda_pedido_pagamento
                WHERE
                id_pedido = $id_pedido AND id_forma >= $id_forma";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_pedido", $id_pedido);
        $stmt->bindValue(":id_forma", $id_forma);
        $stmt->execute();
    }
    
    public function transporte(){
        $sql = "SELECT * FROM fornecedor
                 WHERE   transportadora = 's'";
        return $this->select($this->db, $sql);
    }
}
?>
