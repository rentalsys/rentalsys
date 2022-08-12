<?php
namespace app\models\dao;

use app\core\Model;

class SaidaDao extends Model{
    
    public function lista(){
        $sql = "SELECT *
                FROM saida_avulsa AS e
                INNER JOIN produto AS p ON e.id_produto = p.id_produto
                INNER JOIN localizacao AS l ON e.id_localizacao = l.id_localizacao
                ";
        return $this->select($this->db, $sql);
    }
}
?>
