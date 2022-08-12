<?php
namespace app\models\service;

use app\models\dao\ProdutoLocalizacaoDao;
use app\models\validacao\ProdutoLocalizacaoValidacao;

class ProdutoLocalizacaoService{
    public static function lista(){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->lista();
    }
    
    public static function listaGalpao($id_localizacao){
        $dao     = new ProdutoLocalizacaoDao();
        $produtos =  $dao->listaGalpao($id_localizacao);
        foreach($produtos as $produto){
            $produto->locais = ProdutoLocalizacaoService::listaPorProduto($produto->id_produto);
        }
        
        return $produtos;
    }
   
    public static function atualizarEstoque($id_produto, $id_localizacao, $qtde){
        $dao = new ProdutoLocalizacaoDao();
        $dao->atualizarEstoque($id_produto, $id_localizacao, $qtde);
    }
    public static function listaPorProduto($id_produto){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->listaPorProduto($id_produto);
    }
    public static function listaPorProdutoLimpa($id_produto){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->listaPorProdutoLimpa($id_produto);
    }
    public static function getProdutoLocalizacao($id_produto, $id_localizacao){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->getProdutoLocalizacao($id_produto, $id_localizacao);
    }
    public static function salvar($produto_localizacao, $campo, $tabela){
        $validacao = ProdutoLocalizacaoValidacao::salvar($produto_localizacao);     
        return Service::salvar($produto_localizacao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function salvarEmMassa($id_localizacao, $tipo){
        if($tipo=="P"){
            $produtos = Service::get("produto","eh_produto","S", true);
        }else if($tipo=="I"){
            $produtos = Service::get("produto","eh_insumo","S", true);
        }else{
            $produtos = Service::lista("produto");
        }
        
        foreach($produtos as $produto ){
            if(!self::getProdutoLocalizacao($produto->id_produto, $id_localizacao)){
                Service::inserir(["id_produto" =>$produto->id_produto, "id_localizacao"=>$id_localizacao], "produto_localizacao");
            }
        }
        
    }
}

