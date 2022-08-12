<?php
namespace app\models\dao;

use app\core\Model;

class ItemCotacaoDao extends Model{
    
    public function getItemCotacaoFornecedor($id_cotacao, $id_fornecedor, $id_solicitacao){
        $sql = "SELECT * FROM compra_item_cotacao
               WHERE
                    id_fornecedor = '$id_fornecedor' AND
                    id_solicitacao = '$id_solicitaca' AND
                    id_cotacao = '$id_cotacao' ";
        return $this->select($this->db, $sql, false);
    }
}
?>
