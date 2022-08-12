<?php
namespace app\models\service;

use app\models\dao\ProdutoLocalizacaoDao;
use app\models\validacao\ProdutoLocalizacaoValidacao;

class ProdutoLocalizacaoService{
    public static function salvar($produtolocalizacao, $campo, $tabela){
        $validacao = ProdutoLocalizacaoValidacao::salvar($produtolocalizacao);
        return Service::salvar($produtolocalizacao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function lista(){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->lista();
    }
    
    public static function ListaPorProduto($id_produto){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->ListaPorProduto($id_produto);
    }
    
    public static function atualizarEstoque($id_produto, $id_localizacao, $qtde){
        $dao = new ProdutoLocalizacaoDao();
        $dao->atualizarEstoque($id_produto, $id_localizacao, $qtde);
    }
    
    public static function getProdutoLocalizacao($id_produto, $id_localizacao){
        $dao = new ProdutoLocalizacaoDao();
        return $dao->getProdutoLocalizacao($id_produto, $id_localizacao);
    }
    
}

