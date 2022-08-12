<?php
namespace app\models\dao;

use app\core\Model;

class PedidoDao extends Model{
    public function listaPendente(){
        $sql = "SELECT p.*, c.nome, s.status_pedido FROM  pedido p, contato c, status_pedido s
                WHERE
                 p.id_contato = c.id_contato AND
                 p.id_status  = s.id_status_pedido AND
                 s.id_status_pedido in (1,2,3) ";
        
        return $this->select($this->db, $sql);
    }
    
    public function listaRecusado(){
        $sql = "SELECT p.*, c.nome, s.status_pedido FROM  pedido p, contato c, status_pedido s
                WHERE
                 p.id_contato = c.id_contato AND
                 p.id_status  = s.id_status_pedido AND
                 s.id_status_pedido = 7 ";
        
        return $this->select($this->db, $sql);
    }
    
    public function listaExcluido(){
        $sql = "SELECT p.*, c.nome, s.status_pedido FROM  pedido p, contato c, status_pedido s
                WHERE
                 p.id_contato = c.id_contato AND
                 p.id_status  = s.id_status_pedido AND
                 s.id_status_pedido = 6 ";
        
        return $this->select($this->db, $sql);
    }
    
    public function listaParaFaturar(){
        $sql = "SELECT p.*, c.nome, s.status_pedido FROM  pedido p, contato c, status_pedido s
                WHERE
                 p.id_contato = c.id_contato AND
                 p.id_status  = s.id_status_pedido AND
                 s.id_status_pedido = 4 ";
        
        return $this->select($this->db, $sql);
    }
    
    public function listaFaturado(){
        $sql = "SELECT p.*, c.nome, s.status_pedido FROM  pedido p, contato c, status_pedido s
                WHERE
                 p.id_contato = c.id_contato AND
                 p.id_status  = s.id_status_pedido AND
                 s.id_status_pedido = 5 ";
        
        return $this->select($this->db, $sql);
    }
    
    public function getPedido($id_pedido){
        $sql = "SELECT p.*, c.nome, s.status_pedido FROM  pedido p, contato c, status_pedido s
                WHERE
                 p.id_contato = c.id_contato AND
                 p.id_status  = s.id_status_pedido AND
                 id_pedido = $id_pedido";
        
        return $this->select($this->db, $sql, false);
    }
}

