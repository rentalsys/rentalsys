<?php
namespace app\models\dao;

use app\core\Model;

class MovimentoDao extends Model{
    public function lista($limite){
        $sql = "SELECT m.*, p.produto, t.* FROM movimento m, produto p, tipo_movimento t WHERE
                 m.id_produto = p.id_produto AND
                 m.id_tipo_movimento = t.id_tipo_movimento 
                ";
        if($limite){
            $sql .= " LIMIT $limite";
        }        
        return $this->select($this->db, $sql);
    }
    
    public function filtro($filtro){
        $sql = "SELECT m.*, p.produto, t.* FROM movimento m, produto p, tipo_movimento t WHERE
                 m.id_produto = p.id_produto AND
                 m.id_tipo_movimento = t.id_tipo_movimento
                ";
        if($filtro->id_produto){
            $sql .= " AND m.id_produto = $filtro->id_produto";
        }
        
        if($filtro->data1){
            if($filtro->data2){
                $sql .= " AND data_movimento BETWEEN '$filtro->data1' AND '$filtro->data2' ";
            }else{
                $sql .= " AND data_movimento = '$filtro->data1' ";
            }
        }
        return $this->select($this->db, $sql);
    }
    public function saldoEstoque($id_produto){
        $sql = "SELECT saldoestoque as saldo FROM movimento WHERE id_produto = $id_produto 
                ORDER BY id_movimento DESC LIMIT 1 ";
        $resultado = $this->select($this->db, $sql, false);
        return ($resultado) ? $resultado->saldo: 0;
    }
}

