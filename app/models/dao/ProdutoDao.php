<?php
namespace app\models\dao;

use app\core\Model;

class ProdutoDao extends Model{
    public function atualizarEstoque($id_produto, $qtde){
        $sql = "UPDATE produto SET 
                estoque_atual = estoque_atual + ($qtde), 
                estoque_real  = estoque_real  + ($qtde) 
                WHERE id_produto = $id_produto
            ";
        $this->db->query($sql);
    }
    
    public function listaProduto(){
        $sql = "SELECT * 
                FROM produto AS p
                INNER JOIN produto_marca AS m ON p.id_marca = m.id_marca
                INNER JOIN produto_categoria AS c ON p.id_categoria = c.id_categoria
                ORDER BY p.produto ASC";
        return $this->select($this->db, $sql);
    }

}
?>
