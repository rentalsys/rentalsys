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
  
    public function reservarEstoque($id_produto, $qtde){
        $sql = "UPDATE produto SET
                estoque_atual      = estoque_atual - ($qtde),
                estoque_reservado  = estoque_reservado  + ($qtde)
                WHERE id_produto = $id_produto
            ";
        $this->db->query($sql);
    }
    
    public function excluirReservaDeEstoque($id_produto, $qtde){
        $sql = "UPDATE produto SET
                estoque_real        = estoque_real       - ($qtde),
                estoque_reservado   = estoque_reservado  - ($qtde)
                WHERE id_produto    = $id_produto
            ";
        $this->db->query($sql);
    }
    
    public function buscar($q, $tipo){
        $sql = "SELECT * FROM  produto p, categoria c, unidade u 
                WHERE
                 p.id_categoria = c.id_categoria AND
                 p.id_unidade  = u.id_unidade AND
                 p.produto like '%$q%'";
        if($tipo == "produto"){
            $sql .= " AND eh_produto = 'S' ";
        }else if($tipo == 'insumo'){
            $sql .= " AND eh_insumo = 'S' ";
        }       
      
        return $this->select($this->db, $sql);
    }
}

