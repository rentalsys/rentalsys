<?php
namespace app\models\dao;

use app\core\Model;

class ItemOrdemCompraDao extends Model{    
    public function listaItensOrdemCompra($id_ordem){
        $sql = "SELECT * FROM item_ordem_compra co,   produto p WHERE
                    co.id_produto 			= 	p.id_produto AND
                    id_ordem_compra			= 	$id_ordem";       
        return $this->select($this->db, $sql);
    }
    
    public function getJaTaCadastrado($id_ordem_compra, $id_produto){
        $sql = "SELECT * FROM item_ordem_compra  WHERE
                    id_produto 			= 	$id_produto AND
                    id_ordem_compra			= 	$id_ordem_compra";
        return $this->select($this->db, $sql, false);
    }
}

