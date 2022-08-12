<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\ItemOrdemCompraService;
use app\models\service\OrdemCompraService;
use app\models\service\PedidoService;
use app\models\service\Service;
use app\models\service\ItemPedidoService;

class FinanceiroController extends Controller{
    public function lista_aprovar_ordem_compra(){
        $dados["lista"]        = OrdemCompraService::listarParaAprovar();
        $dados["view"]  = "Financeiro/ListaParaAprovar";
        $this->load("template", $dados);
    }
    
    public function lista_faturar_ordem_compra(){
        $dados["lista"]        = OrdemCompraService::listarParaFaturar();        
        $dados["view"]  = "Financeiro/ListaParaFaturar";
        $this->load("template", $dados);
    }
    
    public function lista_pedido_faturado(){
        $dados["lista"] = PedidoService::listaFaturado();
        $dados["view"]  = "Financeiro/ListaPedidoFaturado";
        $this->load("template", $dados);
    }
    
    public function lista_faturar_pedido(){
        $dados["lista"] = PedidoService::listaParaFaturar();
        $dados["view"]  = "Financeiro/ListaPedidoParaFaturar";
        $this->load("template", $dados);
    }
    public function aprovar_ordem_compra($id_ordem_compra){
        $ordem_compra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordem_compra){
            $this->redirect(URL_BASE ."financeiro/lista_aprovar_ordem_compra");
        }
        if($ordem_compra->id_status_ordem_compra != 2){
            $this->redirect(URL_BASE ."financeiro/lista_aprovar_ordem_compra");
        }
        $dados["ordem_compra"] = $ordem_compra;
        $dados["itens"]   = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        $dados["view"]  = "Financeiro/AprovarOrdemCompra";
        $this->load("template", $dados);
    }
    
    public function faturar_ordem_compra($id_ordem_compra){
        $ordem_compra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordem_compra){
            $this->redirect(URL_BASE ."financeiro/faturar_ordem_compra");
        }
        if($ordem_compra->id_status_ordem_compra != 3){
            $this->redirect(URL_BASE ."financeiro/faturar_ordem_compra");
        }
        $dados["documentos"] = Service::lista("fin_documento_origem");
        $dados["ordem_compra"] = $ordem_compra;
        $dados["itens"]   = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        $dados["view"]  = "Financeiro/FaturarOrdemCompra";
        $this->load("template", $dados);
    }
    
    public function faturar_pedido($id){
        $pedido = PedidoService::getPedido($id);
        if(!$pedido){
            $this->redirect(URL_BASE ."financeiro/lista_faturar_pedido");
        }
        if($pedido->id_status!= 4){
            $this->redirect(URL_BASE ."financeiro/lista_faturar_pedido");
        }
        $dados["documentos"] = Service::lista("fin_documento_origem");
        $dados["pedido"] = $pedido;
        $dados["itens"]   = ItemPedidoService::listaPorPedido($id_pedido);
        $dados["view"]  = "Financeiro/FaturarPedido";
        $this->load("template", $dados);
    }
}

