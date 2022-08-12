<?php
namespace app\models\service;

use app\models\dao\ItemCotacaoDao;
use app\models\validacao\ItemCotacaoValidacao;

class ItemCotacaoService{
    public static function salvar($item_cotacao, $campo, $tabela){
        $validacao = ItemCotacaoValidacao::salvar($item_cotacao);     
        return Service::salvar($item_cotacao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function getItemCotacaoFornecedorCotacao($id_cotacao, $id_fornecedor, $id_solicitacao){
        $dao = new ItemCotacaoDao();
        return $dao->getItemCotacaoFornecedorCotacao($id_cotacao, $id_fornecedor, $id_solicitacao);
    }
    
    public static function listaFornecedorSolicitacaoCotacao($id_cotacao, $id_solicitacao){
        $dao = new ItemCotacaoDao();
        return $dao->listaFornecedorSolicitacaoCotacao($id_cotacao, $id_solicitacao);
    }
    
    public static function agrupaMenorPreco($id_cotacao){
        $dao = new ItemCotacaoDao();
        return $dao->agrupaMenorPreco($id_cotacao);
    }
    public static function getMenorPreco($id_cotacao, $id_solicitacao, $menor_preco){
        $dao = new ItemCotacaoDao();
        return $dao->getMenorPreco($id_cotacao, $id_solicitacao, $menor_preco);
    }
    
    public static function getVencedor($id_solicitacao){
        $dao = new ItemCotacaoDao();
        return $dao->getVencedor($id_solicitacao);
    }
    
    public static function aprovar($id_item_cotacao, $id_cotacao){
        $dao = new ItemCotacaoDao();
        $itemCotacao = Service::get("item_cotacao", "id_item_cotacao",$id_item_cotacao);
        
        //Verifica se existe ordem de compra para o fornecedor e a cotação
        $ordem_compra = OrdemCompraService::verficaSeCotacaoTemOrdem($id_cotacao, $itemCotacao->id_fornecedor);
        if(!$ordem_compra){
            $id = Service::inserir([
                "id_fornecedor"=>$itemCotacao->id_fornecedor,
                "id_cotacao"   => $id_cotacao,
                "id_status_ordem_compra"   => 2,
                "data_emissao" => hoje()
            ], "ordem_compra");
            $ordem_compra = Service::get("ordem_compra","id_ordem_compra", $id);
        }
        
        //muda o status do vencedor para 3
        Service::editar(["id_status_item_cotacao" => 3, "id_ordem_compra" =>$ordem_compra->id_ordem_compra, "id_item_cotacao"=>$id_item_cotacao], "id_item_cotacao", "item_cotacao");
        //muda o status dos rejeitos para 5
        $dao->marcarComoRejeitado($itemCotacao->id_solicitacao, $id_item_cotacao);
        
        //Inserir os itens da ordem de compra
        if(!ItemOrdemCompraService::getJaTaCadastrado($ordem_compra->id_ordem_compra, $itemCotacao->id_produto)){
            Service::inserir([
                "id_ordem_compra"=>$ordem_compra->id_ordem_compra,
                "id_produto"   => $itemCotacao->id_produto,
                "qtde" => $itemCotacao->qtde,
                "valor" => $itemCotacao->valor_cotacao,
                "subtotal" => $itemCotacao->subtotal,
            ], "item_ordem_compra");
        }
        
        //Adicionar o fornecedor e a ordem de compra na solicitação e mudar o status para 3        
        Service::editar(["id_status_solicitacao" => 3, 
                          "id_ordem_compra" =>$ordem_compra->id_ordem_compra,
                          "id_fornecedor"   => $itemCotacao->id_fornecedor,
                          "id_solicitacao"  =>$itemCotacao->id_solicitacao], "id_solicitacao", "solicitacao");
        
      $todos= $dao->getTodosCotados($id_cotacao);
     
      if($todos <=0 ){
          Service::editar(["id_status_cotacao" => 4, "id_cotacao" =>$id_cotacao], "id_cotacao", "cotacao");
       }
     
      
        
    }
}

