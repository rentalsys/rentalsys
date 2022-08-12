<?php
namespace app\models\dao;

use app\core\Model;

class ItemordemcompraDao extends Model{
    public function ListaItemPorOrdemCompra($id_ordem){
        $sql = "SELECT * FROM compra_item_ordem_compra co
                INNER JOIN produto p ON co.id_produto = p.id_produto
                WHERE id_ordem_compra = $id_ordem";
        return $this->select($this->db, $sql);
    }
    public function listaItensOrdemCompra($id_ordem){
        $sql = "SELECT * FROM compra_item_ordem_compra co,   produto p WHERE
                    co.id_produto 			= 	p.id_produto AND
                    id_ordem_compra			= 	$id_ordem";
        return $this->select($this->db, $sql);
    }
    
}

