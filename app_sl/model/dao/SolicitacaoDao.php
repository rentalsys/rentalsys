<?php
namespace app\models\dao;

use app\core\Model;

class SolicitacaoDao extends Model{
    public function listaPorStatus($id_status){
        $sql = "SELECT s.*, p.produto, st.* FROM solicitacao s, produto p, status_solicitacao st WHERE
                s.id_produto = p.id_produto AND
                s.id_status_solicitacao = st.id_status_solicitacao and s.id_status_solicitacao = $id_status
        ";
        
        return $this->select($this->db, $sql);
    }
    
    public function getSolicitacaoPorOrdemProducao($id_produto, $id_ordem_producao){
        $sql = "SELECT *  FROM solicitacao WHERE id_produto = $id_produto AND id_ordem_producao = $id_ordem_producao  ";  
        
        return $this->select($this->db, $sql, false);
    }
    
    public function listaPorCotacao($id_cotacao){
        $sql = "SELECT p.produto, st.*, s.* FROM solicitacao_cotacao sc, solicitacao s, status_solicitacao st, produto p
                WHERE
                    sc.id_solicitacao = s.id_solicitacao AND 
                    s.id_produto = p.id_produto AND 
                    s.id_status_solicitacao = st.id_status_solicitacao AND
                    sc.id_cotacao = $id_cotacao
                 ";
        return $this->select($this->db, $sql);
    }
}

