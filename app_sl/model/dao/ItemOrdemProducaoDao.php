<?php
namespace app\models\dao;

use app\core\Model;

class ItemOrdemProducaoDao extends Model{    
    public function listaItensOrdemProducao($id_ordem){
        $sql = "SELECT * FROM item_ordem_producao co,   produto p WHERE
                    co.id_produto 			= 	p.id_produto AND
                    id_ordem_producao			= 	$id_ordem";       
        return $this->select($this->db, $sql);
    }
    
    public function getItemPorProdutoPorOrdemProducao($id_produto, $id_ordem_producao){
        $sql = "SELECT * FROM item_ordem_producao  WHERE
                    id_produto 			= 	id_produto AND
                    id_ordem_producao			= 	$id_ordem_producao";
        return $this->select($this->db, $sql, false);
    }
}

