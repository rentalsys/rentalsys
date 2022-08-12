<?php
namespace app\models\dao;

use app\core\Model;

class ItemCotacaoDao extends Model{
    public function getItemCotacaoFornecedorCotacao($id_cotacao, $id_fornecedor, $id_solicitacao){
        $sql = "SELECT * FROM item_cotacao
                WHERE
                    id_fornecedor = $id_fornecedor AND
                    id_solicitacao= $id_solicitacao AND
                    id_cotacao    = $id_cotacao  
                ";
        return  $this->select($this->db, $sql, false);
    }
    
    public function listaFornecedorSolicitacaoCotacao($id_cotacao, $id_solicitacao){
        $sql = "SELECT c.nome, co.*, sc.*, p.produto FROM item_cotacao co, contato c, status_item_cotacao sc,  produto p WHERE
                    co.id_fornecedor 		=	c.id_contato AND
                    co.id_status_item_cotacao	= 	sc.id_status_item_cotacao AND
                    co.id_produto 		= 	p.id_produto AND
                    id_solicitacao 		= 	$id_solicitacao AND
                    id_cotacao 			= 	$id_cotacao";
        return  $this->select($this->db, $sql);
    }
    
    public function agrupaMenorPreco($id_cotacao){
        $sql = "SELECT id_solicitacao, min(valor_cotacao) as menor FROM item_cotacao
                WHERE valor_cotacao > 0 and id_cotacao = $id_cotacao 
                group by id_solicitacao  ";
        return  $this->select($this->db, $sql);
    }
    
    public function getMenorPreco($id_cotacao, $id_solicitacao, $menor_preco){
        $sql = "SELECT c.nome, c.id_contato, i.* FROM item_cotacao i, contato c WHERE
                    i.id_fornecedor 		=   c.id_contato AND
                    id_solicitacao 			=   $id_solicitacao AND
                    id_cotacao 				=   $id_cotacao AND
		            valor_cotacao			=   $menor_preco
					LIMIT 1 ";
        return  $this->select($this->db, $sql, false);
    }
    
    public function getVencedor($id_solicitacao){
        $sql = "SELECT c.nome, c.id_contato, i.* FROM item_cotacao i, contato c WHERE
                    i.id_fornecedor 		=   c.id_contato AND
                    id_solicitacao 			=   $id_solicitacao
					LIMIT 1 ";
        return  $this->select($this->db, $sql, false);
    }
    public function marcarComoRejeitado($id_solicitacao, $id_item_cotacao){
        $sql ="UPDATE item_cotacao SET id_status_item_cotacao = 5, id_ordem_compra = -1
               WHERE id_solicitacao = $id_solicitacao AND id_item_cotacao <> $id_item_cotacao ";
        $this->db->query($sql);
    }
    
    public function getTodosCotados($id_cotacao){
        $sql = "SELECT count(*) as total FROM item_cotacao  WHERE
                    id_ordem_compra is null AND
                    id_cotacao 			=   $id_cotacao ";
        $resultado =  $this->select($this->db, $sql, false);
        return $resultado->total;
    }
}

