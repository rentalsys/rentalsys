<?php
namespace app\models\dao;

use app\core\Model;

class ItemorcamentoDao extends Model{
    public function excluir($id_pedido, $id_produto){
        $sql = "DELETE FROM venda_item_pedido 
                WHERE 
                id_pedido = $id_pedido AND id_produto = $id_produto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_produto", $id_produto);
        $stmt->bindValue(":id_pedido", $id_pedido);
        $stmt->execute();
    }
    
    public function ExcluirItens($id_pedido){
        $sql = "DELETE FROM venda_item_pedido
                WHERE
                id_pedido = $id_pedido";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_pedido", $id_pedido);
        $stmt->execute();
        
        $sqle = "UPDATE venda_pedido SET total=0, qtd_produtos=0
                WHERE
                id_pedido = $id_pedido";
        $stmte = $this->db->prepare($sqle);
        $stmte->bindValue(":id_pedido", $id_pedido);
        $stmte->execute();
    }
    
    public function atualizaQtdeItem($id_pedido, $id_produto, $qtde, $total, $total_somado, $frete, $desconto_percentual, $desconto_valor){
        $sql = "UPDATE venda_item_pedido SET qtde=:qtde, total=:total, total_somado=:total_somado, frete=:frete, desconto_percentual=:desconto_percentual, desconto_valor=:desconto_valor           
                WHERE
                id_pedido = :id_pedido AND id_produto = :id_produto";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":id_produto", $id_produto);
        $stmt->bindValue(":id_pedido", $id_pedido);
        $stmt->bindValue(":qtde", $qtde);
        $stmt->bindValue(":total", $total);
        $stmt->bindValue(":total_somado", $total_somado);
        $stmt->bindValue(":frete", $frete);
        $stmt->bindValue(":desconto_percentual", $desconto_percentual);
        $stmt->bindValue(":desconto_valor", $desconto_valor - 1);
        $stmt->execute();
        
        
    }

    public function getItemProduto($id_pedido, $id_produto){
        $sql = "SELECT * FROM venda_item_pedido
                WHERE id_pedido = $id_pedido AND id_produto = $id_produto";
        return $this->select($this->db, $sql, false);  
        
    }
    
    
}

