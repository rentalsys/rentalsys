<?php
namespace app\models\dao;

use app\core\Model;

class TransferenciaDao extends Model{
    
    public function lista(){
        $sql = "SELECT *, lo.localizacao as destino, l.localizacao as origem
                FROM transferencia AS t
                        INNER JOIN localizacao AS l
                        ON t.id_origem    = l.id_localizacao
                        INNER JOIN localizacao AS lo
                        ON t.id_destino    = lo.id_localizacao
                        INNER JOIN produto AS p
                        ON t.id_produto    = p.id_produto
                        ORDER BY data_transferencia DESC";
        return $this->select($this->db, $sql);
    }
}
?>
