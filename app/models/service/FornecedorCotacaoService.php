<?php
namespace app\models\service;

use app\models\dao\FornecedorCotacaoDao;
use app\models\validacao\FornecedorCotacaoValidacao;
use app\core\Flash;


class FornecedorCotacaoService{
    public static function salvar($fornece_dorcotacao, $campo, $tabela){
        $validacao = FornecedorCotacaoValidacao::salvar($fornece_dorcotacao);
        return Service::salvar($fornece_dorcotacao, $campo, $validacao->listaErros(), $tabela);
    }
    public static function listaPorCotacao($id_cotacao){
        $dao = new FornecedorCotacaoDao();
        return $dao->listaPorCotacao($id_cotacao);
        
    }
    
    public static function getFornecedorCotacao($id_fornecedor_cotacao, $id_fornecedor){
        $dao = new FornecedorCotacaoDao();
        return $dao->getFornecedorCotacao($id_fornecedor_cotacao, $id_fornecedor);
    }

}
?>
