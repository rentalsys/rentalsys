<?php
namespace app\models\service;

use app\models\dao\OrdemcompraDao;
use app\models\validacao\OrdemcompraValidacao;

class OrdemcompraService{
    public static function salvar($ordem_compra, $campo, $tabela){
        $validacao = OrdemcompraValidacao::salvar($marca);
        return Service::salvar($ordem_compra, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function getOrdemCompraAberta(){
        $dao = new OrdemcompraDao();
        return $dao->getOrdemCompraAberta();
    }
    
    public static function getOrdemCompra($id_ordem){
        $dao = new OrdemcompraDao();
        return $dao->getOrdemCompra($id_ordem);
    }
    
    public static function lista(){
        $dao = new OrdemcompraDao();
        return $dao->lista();
    }
    
    public static function listarParaFaturar(){
        $dao = new OrdemCompraDao();
        return $dao->listarParaFaturar();
    }
    
    public static function listarParaAprovar(){
        $dao = new OrdemCompraDao();
        return $dao->listarParaAprovar();
    }
    
    public static function atualizaTotal($id_ordem_compra){
        $soma = Service::getSoma("compra_item_ordem_compra","subtotal","id_ordem_compra",$id_ordem_compra);
        Service::editar(["valor_total"=>$soma, "id_ordem_compra"=>$id_ordem_compra], "id_ordem_compra", "compra_ordem_compra");
    }
}

