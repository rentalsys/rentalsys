<?php
namespace app\models\dao;

use app\core\Model;

class CotacaoDao extends Model{
    
    public function lista(){
        $sql = "SELECT *
                FROM compra_cotacao AS e
                INNER JOIN compra_status_cotacao AS s ON e.id_status_cotacao = s.id_status_cotacao
                ORDER BY e.data_abertura ASC";
        return $this->select($this->db, $sql);
    }
    
    public function filtro($filtro,$data1,$data2){
        $sql = "SELECT * FROM compra_cotacao AS e
                INNER JOIN compra_status_cotacao AS s ON e.id_status_cotacao = s.id_status_cotacao
                WHERE e.id_status_cotacao LIKE '$filtro->id_status_cotacao' AND (data_abertura BETWEEN '$data1' AND '$data2 23:59:59') ORDER BY e.data_abertura DESC";
        
        
        return $this->select($this->db, $sql);
    }
}
?>
