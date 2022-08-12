<?php
namespace app\models\dao;

use app\core\Model;

class MovimentoDao extends Model{
    public function saldoEstoque($id_produto){
        $sql = "SELECT saldoestoque as saldo FROM movimento WHERE id_produto = $id_produto 
        ORDER BY id_movimento DESC LIMIT 1";
        $resultado = $this->select($this->db, $sql, false);
        return ($resultado) ? $resultado->saldo: 0;
    }
    
    public function listaMovimento(){
        $sql = "SELECT *
                FROM movimento AS m
                INNER JOIN tipo_movimento AS t ON m.id_tipo_movimento = t.id_tipo_movimento
                INNER JOIN localizacao AS l ON m.id_localizacao = l.id_localizacao
                INNER JOIN produto AS p ON m.id_produto = p.id_produto
                ORDER BY m.id_movimento DESC";
        return $this->select($this->db, $sql);
    }
    
    public function filtro($filtro){
        $sql = "SELECT m.*, p.produto, t.*, l.* FROM  movimento AS m
                INNER JOIN produto AS p ON m.id_produto = p.id_produto
                INNER JOIN tipo_movimento AS t ON m.id_tipo_movimento = t.id_tipo_movimento
                INNER JOIN localizacao AS l ON m.id_localizacao = l.id_localizacao
                WHERE 
                ";
        if($filtro->id_produto){
            $sql .= " m.id_produto LIKE '$filtro->id_produto'";
        }
        if($filtro->data1){
            if($filtro->data2){
                $sql .= "AND data_movimento BETWEEN '$filtro->data1' AND '$filtro->data2'";
            } else {
                $sql .= "AND data_movimento = '$filtro->data1' ";
            }
        }
        return $this->select($this->db, $sql);
    }
}

