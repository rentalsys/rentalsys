<?php
namespace app\models\service;

use app\models\validacao\PedidoValidacao;
use app\models\dao\PedidoDao;

class PedidoService{
    public static function salvar($pedido, $campo, $tabela){
        $validacao = PedidoValidacao::salvar($marca);
        return Service::salvar($orcamento, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function lista(){
        $dao = new PedidoDao();
        return $dao->lista();
    }
    
    public static function getPedido($id_pedido){
        $dao = new PedidoDao();
        return $dao->getPedido($id_pedido);
    }
    
    public static function getPedidoItem($id_pedido){
        $dao = new PedidoDao();
        return $dao->getPedidoItem($id_pedido);
    }
    
    public static function listaParaFaturar(){
        $dao = new PedidoDao();
        return $dao->listaParaFaturar();
    }

    public static function listaFaturado(){
        $dao = new PedidoDao();
        return $dao->listaFaturado();
    }
}

