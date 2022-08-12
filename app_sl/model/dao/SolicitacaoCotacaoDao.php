<?php
namespace app\models\dao;

use app\core\Model;

class SolicitacaoCotacaoDao extends Model{
    public function listaPorCotacao($id_cotacao){
        $sql = "SELECT 
                       sc.*,s.*, p.produto FROM solicitacao_cotacao sc, cotacao c, solicitacao s, produto p 
                 WHERE 
                    sc.id_solicitacao = s.id_solicitacao AND 
                    sc.id_cotacao     = c.id_cotacao AND
                    s.id_produto      = p.id_produto AND
                    sc.id_cotacao     = $id_cotacao 
                ";
        return $this->select($this->db, $sql);
    }
}

