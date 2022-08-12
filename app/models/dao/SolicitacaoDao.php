<?php
namespace app\models\dao;

use app\core\Model;

class SolicitacaoDao extends Model{
    
    public function lista(){
        $sql = "SELECT *
                FROM compra_solicitacao AS e
                INNER JOIN produto AS p ON e.id_produto = p.id_produto 
                INNER JOIN usuario AS u ON e.id_usuario_solicitou = u.id_usuario 
                INNER JOIN compra_status_solicitacao AS s ON e.id_status_solicitacao = s.id_status_solicitacao
                WHERE e.id_status_solicitacao = 1 
                ORDER BY e.data_solicitacao ASC";
        return $this->select($this->db, $sql);
    }
    
    public function listaPorStatus($id_status){
        $sql = "SELECT s.*, p.produto, st.* FROM compra_solicitacao s, produto p, compra_status_solicitacao st WHERE
        s.id_produto = p.id_produto AND
        s.id_status_solicitacao = st.id_status_solicitacao AND s.id_status_solicitacao = $id_status
        ";
        return $this->select($this->db, $sql);
    }
}
?>
