<?php
namespace app\models\dao;

use app\core\Model;

class OrdemCompraDao extends Model{
    
    public function getOrdemCompra($id_ordem){
        $sql = "SELECT * FROM ordem_compra o, contato c , status_ordem_compra s
                WHERE o.id_fornecedor = c.id_contato AND
                      o.id_status_ordem_compra =  s.id_status_ordem_compra
                     AND id_ordem_compra = $id_ordem ";
        return $this->select($this->db, $sql, false);
    }
    
    public function getOrdemCompraAberta(){
        $sql = "SELECT * FROM ordem_compra o, contato c
                WHERE o.id_fornecedor = c.id_contato AND
                    finalizada = 'N' AND avulsa = 'S' ";
        return $this->select($this->db, $sql, false);
    }
    
    public function lista(){
        $sql = "SELECT * FROM ordem_compra o, contato c , status_ordem_compra s
                WHERE o.id_fornecedor = c.id_contato AND
                      o.id_status_ordem_compra =  s.id_status_ordem_compra ";
        return $this->select($this->db, $sql);
    }
    
    public function listarParaAprovar(){
        $sql = "SELECT * FROM ordem_compra o, contato c , status_ordem_compra s
                WHERE o.id_fornecedor = c.id_contato AND
                      o.id_status_ordem_compra =  s.id_status_ordem_compra AND o.id_status_ordem_compra = 2";
        return $this->select($this->db, $sql);
    }
    
    public function listarParaFaturar(){
        $sql = "SELECT * FROM ordem_compra o, contato c , status_ordem_compra s
                WHERE o.id_fornecedor = c.id_contato AND
                      o.id_status_ordem_compra =  s.id_status_ordem_compra AND o.id_status_ordem_compra = 3";
        return $this->select($this->db, $sql);
    }
    public function verficaSeCotacaoTemOrdem($id_cotacao, $id_fornecedor){
        $sql = " SELECT * FROM ordem_compra where id_cotacao = $id_cotacao AND id_fornecedor = $id_fornecedor";
        return $this->select($this->db, $sql, false);
    }
}

