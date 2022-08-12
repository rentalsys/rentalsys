<?php
namespace app\models\dao;

use app\core\Model;

class OrdemProducaoDao extends Model{
    
    public function getOrdemProducao($id_ordem){
        $sql = "SELECT * FROM ordem_producao o,  status_ordem_producao s
                WHERE o.id_status_ordem_producao =  s.id_status_ordem_producao
                     AND id_ordem_producao = $id_ordem ";
        return $this->select($this->db, $sql, false);
    }
    
    public function getOrdemProducaoAberta(){
        $sql = "SELECT * FROM ordem_producao o,  status_ordem_producao s
                WHERE o.id_status_ordem_producao =  s.id_status_ordem_producao AND
                    finalizado = 'N' AND avulsa = 'S' ";
        return $this->select($this->db, $sql, false);
    }
    
    public function getIdOrdemProducaoPorPedido($id_pedido){
        $sql = "SELECT id_ordem_producao FROM ordem_producao  WHERE id_pedido = $id_pedido ";
        return $this->select($this->db, $sql, false)->id_ordem_producao;
    }
    public function lista(){
        $sql = "SELECT * FROM ordem_producao o,  status_ordem_producao s
                WHERE 
                      o.id_status_ordem_producao =  s.id_status_ordem_producao ";
        return $this->select($this->db, $sql);
    }
}

