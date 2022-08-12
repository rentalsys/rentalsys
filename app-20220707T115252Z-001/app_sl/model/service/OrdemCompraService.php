<?php
namespace app\models\service;

use app\models\dao\OrdemCompraDao;
use app\models\entidade\Movimento;
use app\models\validacao\CategoriaValidacao;

class OrdemCompraService{
    public static function salvar($ordem_compra, $campo, $tabela){
        $validacao = CategoriaValidacao::salvar($ordem_compra);     
        return Service::salvar($ordem_compra, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function getOrdemCompra($id_ordem){
        $dao = new OrdemCompraDao();
        return $dao->getOrdemCompra($id_ordem);
    }
    
    public static function getOrdemCompraAberta(){
        $dao = new OrdemCompraDao();
        return $dao->getOrdemCompraAberta();
    }
    
    public static function lista(){
        $dao = new OrdemCompraDao();
        return $dao->lista();
    }
    
    public static function listarParaAprovar(){
        $dao = new OrdemCompraDao();
        return $dao->listarParaAprovar();
    }
    
    public static function listarParaFaturar(){
        $dao = new OrdemCompraDao();
        return $dao->listarParaFaturar();
    }
    public static function atualizaTotal($id_ordem_compra){
        $soma = Service::getSoma("item_ordem_compra", "subtotal","id_ordem_compra",$id_ordem_compra);
        Service::editar(["valor_total"=>$soma, "id_ordem_compra"=>$id_ordem_compra], "id_ordem_compra", "ordem_compra");        
    }
    
    public static function verficaSeCotacaoTemOrdem($id_cotacao, $id_fornecedor){
        $dao = new OrdemCompraDao();
        return $dao->verficaSeCotacaoTemOrdem($id_cotacao, $id_fornecedor);
    }
    
    public static function finalizarOrdemCompra($id_ordem_compra){
        $produtos = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);        
        foreach($produtos as $produto){            
            //Dar entrada no galpão de Compra
            $mov = new Movimento();
            $mov->setId_localizacao(101);
            $mov->setId_tipo_movimento(3);
            $mov->setId_ordem_compra($id_ordem_compra);
            $mov->setEntrada_saida("E");
            $mov->setId_produto($produto->id_produto);
            $mov->setData_movimento(hoje());
            $mov->setQtde_movimento($produto->qtde);
            $mov->setValor_movimento($produto->valor);
            $mov->setSubtotal_movimento($produto->subtotal);
            $mov->setDescricao("Entrada por ordem de compra : " . $id_ordem_compra);
            MovimentoService::inserir($mov,1);
            
        }
        
        Service::editar([ "id_status_ordem_compra"=>5,"data_finalizacao" =>hoje(), "id_ordem_compra"=>$id_ordem_compra], "id_ordem_compra", "ordem_compra");
        
    }
  
}

