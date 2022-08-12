<?php
namespace app\models\service;

use app\models\dao\ItemCotacaoDao;
use app\models\validacao\ItemcotacaoValidacao;

class ItemcotacaoService{
    public static function salvar($Itemcotacao, $campo, $tabela){
        $validacao = ItemcotacaoValidacao::salvar($Itemcotacao);
        return Service::salvar($Itemcotacao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function getItemCotacaoFornecedor($id_cotacao, $id_fornecedor, $id_solicitacao){
        $dao = new ItemCotacaoDao();
        return $dao->getItemCotacaoFornecedor($id_cotacao, $id_fornecedor, $id_solicitacao);
    }
}

