<?php
namespace app\models\dao;

use app\core\Model;

class PipelineDao extends Model{
    
    public function listaCliente(){
        $sql = "SELECT id_cliente, nome FROM cliente
            ORDER BY nome ASC";
        return $this->select($this->db, $sql);
    }
    
    public function lista(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido 
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 1
                ";
        return $this->select($this->db, $sql);
    }
    
    public function listaStatus(){
        $sql = "SELECT * FROM venda_status_pedido AS s
                WHERE s.id_status_pedido != 1
                ";
        return $this->select($this->db, $sql);
    }
    
    public function aguardando(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 2
                ";
        return $this->select($this->db, $sql);
    }
    
    public function aprovado(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 3
                ";
        return $this->select($this->db, $sql);
    }
    
    public function enviado(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 4
                ";
        return $this->select($this->db, $sql);
    }
    
    public function assinado(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 5
                ";
        return $this->select($this->db, $sql);
    }
    public function faturado(){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario
                WHERE p.id_status_pedido = 6
                ";
        return $this->select($this->db, $sql);
    }
    public function getTimeline($id_pedido){
        $sql = "SELECT * FROM venda_pedido AS p
                INNER JOIN cliente AS c ON p.id_cliente = c.id_cliente 
                INNER JOIN usuario AS u ON p.id_usuario = u.id_usuario 
                INNER JOIN venda_status_pedido AS s ON p.id_status_pedido = s.id_status_pedido 
                WHERE p.id_pedido = $id_pedido";
        return $this->select($this->db, $sql, false);
    }
    
    public function getTimelineItem($id_pedido){
        $sql = "SELECT * FROM venda_item_pedido AS i
                INNER JOIN produto AS p ON i.id_produto = p.id_produto
                WHERE i.id_pedido = $id_pedido";
        return $this->select($this->db, $sql);
    }
}
?>
