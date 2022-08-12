<?php
namespace app\models\service;

use app\models\dao\ItemordemcompraDao;
use app\models\validacao\ItemordemcompraValidacao;

class ItemordemcompraService{
    public static function salvar($itemordemcompra, $campo, $tabela){
        $validacao = ItemordemcompraValidacao::salvar($itemordemcompra);
        return Service::salvar($itemordemcompra, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function ListaItemPorOrdemCompra($id_ordem_compra){
        $dao = new ItemordemcompraDao();
        return $dao->ListaItemPorOrdemCompra($id_ordem_compra);
    }
    
    public static function listaItensOrdemCompra($id_ordem_compra){
        $dao = new ItemOrdemCompraDao();
        return $dao->listaItensOrdemCompra($id_ordem_compra);
    }
}

