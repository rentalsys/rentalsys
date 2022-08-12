<?php
namespace app\models\dao;

use app\core\Model;

class ProdutoLocalizacaoDao extends Model{
    public function lista(){
        $sql = "SELECT * FROM produto_localizacao pl, produto p, localizacao l WHERE
                    pl.id_produto = p.id_produto and
                    pl.id_localizacao = l.id_localizacao 
                ";
        return $this->select($this->db, $sql);
    }
    
    public function listaGalpao($id_localizacao){
        $sql = "SELECT p.produto, pl.* FROM produto_localizacao pl, produto p, localizacao l WHERE
                    pl.id_produto = p.id_produto and
                    pl.id_localizacao = l.id_localizacao AND
                    pl.id_localizacao = $id_localizacao and pl.estoque > 0
                ";
        return $this->select($this->db, $sql);
    }
    public function getProdutoLocalizacao($id_produto, $id_localizacao){
        $sql = "SELECT * FROM produto_localizacao  WHERE id_produto  = $id_produto and id_localizacao = $id_localizacao";        
        return $this->select($this->db, $sql, false);
    }
    
    public function listaPorProduto($id_produto){
        $sql = "SELECT p.produto, l.*, pl.* FROM produto_localizacao pl, produto p, localizacao l WHERE
                    pl.id_produto = p.id_produto and
                    pl.id_localizacao = l.id_localizacao and pl.id_produto = $id_produto
                ";
      
        return $this->select($this->db, $sql);
    }
    
    public function listaPorProdutoLimpa($id_produto){
        $sql = "SELECT pl.*, p.produto, l.* FROM produto_localizacao pl, produto p, localizacao l WHERE
                    pl.id_produto = p.id_produto and
                    pl.id_localizacao = l.id_localizacao and pl.id_produto = $id_produto
                ";
        
        return $this->select($this->db, $sql);
    }
    
    public function atualizarEstoque($id_produto, $id_localizacao, $qtde){
        $sql = "UPDATE produto_localizacao SET
                estoque = estoque + ($qtde)
                WHERE id_produto = $id_produto and id_localizacao = $id_localizacao ";
        $this->db->query($sql);
    }
}

