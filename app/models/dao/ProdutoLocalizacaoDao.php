<?php
namespace app\models\dao;

use app\core\Model;

class ProdutoLocalizacaoDao extends Model{
    
    public function lista(){
        $sql = "SELECT *
                FROM produto_localizacao AS pl
                INNER JOIN produto AS p ON pl.id_produto = p.id_produto
                INNER JOIN localizacao AS l ON pl.id_localizacao = l.id_localizacao
                ";
        return $this->select($this->db, $sql);
    }
    
    public function ListaPorProduto($id_produto){
        $sql = "SELECT *
                FROM produto_localizacao AS pl
                INNER JOIN produto AS p ON pl.id_produto = p.id_produto
                INNER JOIN localizacao AS l ON pl.id_localizacao = l.id_localizacao
                WHERE pl.id_produto = $id_produto
                ";
        return $this->select($this->db, $sql);
    }
    
    public function getProdutoLocalizacao($id_produto, $id_localizacao){
        $sql = "SELECT * FROM produto_localizacao WHERE
                id_produto = $id_produto and id_localizacao = $id_localizacao";
        return $this->select($this->db, $sql, false);
        
    }
    
    public function atualizarEstoque($id_produto, $id_localizacao, $qtde){
        $sql = "UPDATE produto_localizacao SET
                estoque = estoque + ($qtde)
                WHERE id_produto = $id_produto AND id_localizacao = $id_localizacao
            ";
        $this->db->query($sql);
    }
}
?>
