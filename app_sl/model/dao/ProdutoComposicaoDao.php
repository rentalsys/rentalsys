<?php
namespace app\models\dao;

use app\core\Model;

class ProdutoComposicaoDao extends Model{
    public function listaPorProduto($id_produto){
        $sql ="SELECT i.produto, i.preco, c.*, i.estoque_atual, i.estoque_reservado, i.estoque_real, pp.* 
                    FROM produto_composicao c, produto i , etapa_producao e, processo_produtivo pp
               WHERE 
               c.id_insumo        = i.id_produto AND
               c.id_etapa       = e.id_etapa_producao AND
               e.id_processo_produtivo = pp.id_processo_produtivo and
               c.id_produto_pai = $id_produto";
        return $this->select($this->db, $sql);
    }
    
    public  function getProdutoEtapaInsumo($id_produto, $id_etapa, $id_insumo){
        $sql ="SELECT *  FROM produto_composicao WHERE
               id_insumo        = $id_insumo AND
               id_etapa         = $id_etapa AND
               id_produto_pai   = $id_produto ";
        return $this->select($this->db, $sql);
    }
    
    public function listaPorEtapa($id_etapa){
        $sql ="SELECT i.produto, i.preco, c.* FROM produto_composicao c, produto i
               WHERE
               c.id_insumo  = i.id_produto AND
               c.id_etapa   = $id_etapa ";
        return $this->select($this->db, $sql);
    }	
	
	
	
}

