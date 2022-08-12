<?php
namespace app\models\dao;

use app\core\Model;

class ItemPedidoDao extends Model{
    public function listaItens($id_pedido){
        $sql = "SELECT i.*, p.*, u.* FROM item i, produto p, unidade u WHERE
                    i.id_produto 		=	p.id_produto AND
                    p.id_unidade        = u.id_unidade AND
                    id_pedido 			= 	$id_pedido";
        return  $this->select($this->db, $sql);
    }
    
    public function listaPorPedido($id_pedido){
        $sql = "SELECT i.*, p.produto, p.estoque_atual FROM item i, produto p WHERE
                    i.id_produto 		=	p.id_produto AND
                    id_pedido 			= 	$id_pedido";
        return  $this->select($this->db, $sql);
    }    
   
    public function listaPorPedidoLocalizacao($id_pedido){
        $sql = "SELECT 
                    i.*, p.produto, pl.*, l.localizacao
                FROM 
                    item i, produto_localizacao pl, localizacao l, produto p 
                WHERE
                    i.id_produto 		=	p.id_produto AND
                    i.id_produto        =   pl.id_produto AND
                    i.id_localizacao    =   pl.id_localizacao AND
                    pl.id_localizacao   =   l.id_localizacao AND
                    id_pedido 			= 	$id_pedido";
        return  $this->select($this->db, $sql);
    }
    
    public function getItemPedido($id_item){
        $sql = "SELECT i.*, p.produto, p.estoque_atual FROM item i, produto p WHERE
                    i.id_produto 		=	p.id_produto AND
                    id_item 			= 	$id_item";
        return  $this->select($this->db, $sql,false);
    }
  
    
    
    
   
    
   
  
}

