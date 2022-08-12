<?php
namespace app\models\service;

use app\models\dao\ReservaDao;

class ReservaService{
    public static function existeReserva($id_produto, $id_ordem_producao){
        $dao = new ReservaDao();
        return $dao->existeReserva($id_produto, $id_ordem_producao);
    }
    
    public static function existeReservaNoPedido($id_produto, $id_pedido){
        $dao = new ReservaDao();
        return $dao->existeReservaNoPedido($id_produto, $id_pedido);
    }
}

