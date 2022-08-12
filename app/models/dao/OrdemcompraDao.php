<?php
namespace app\models\dao;

use app\core\Model;

class OrdemcompraDao extends Model{
    
    public function getOrdemCompraAberta(){
        $sql = "SELECT *
                FROM compra_ordem_compra AS o
                INNER JOIN fornecedor AS f ON o.id_fornecedor = f.id_fornecedor
                WHERE finalizada = 'n' AND avulsa = 's'";
        return $this->select($this->db, $sql, false);
    }
    
    public function getOrdemCompra($id_ordem){
        $sql = "SELECT *
                FROM compra_ordem_compra AS o
                INNER JOIN fornecedor AS f ON o.id_fornecedor = f.id_fornecedor
                INNER JOIN compra_status_ordem_compra AS s ON o.id_status_ordem_compra = s.id_status_ordem_compra
                WHERE id_ordem_compra = $id_ordem";
        return $this->select($this->db, $sql, false);
    }
    
    public function lista(){
        $sql = "SELECT *
                FROM compra_ordem_compra AS o
                INNER JOIN fornecedor AS f ON o.id_fornecedor = f.id_fornecedor
                INNER JOIN compra_status_ordem_compra AS s ON o.id_status_ordem_compra = s.id_status_ordem_compra";
        return $this->select($this->db, $sql);
    }
    
    public function listarParaFaturar(){
        $sql = "SELECT * FROM compra_ordem_compra AS o
                INNER JOIN fornecedor AS f ON o.id_fornecedor = f.id_fornecedor
                INNER JOIN compra_status_ordem_compra AS s ON o.id_status_ordem_compra = s.id_status_ordem_compra
                WHERE o.id_status_ordem_compra = 3";
        return $this->select($this->db, $sql);
    }
    
}
?>
