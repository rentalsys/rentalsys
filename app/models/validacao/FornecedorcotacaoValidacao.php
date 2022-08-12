<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\FornecedorCotacaoService;

class FornecedorcotacaoValidacao{
    public static function salvar($fornecedor_cotacao){
        $validacao = new Validacao();
        
        $validacao->setData("id_fornecedor", $fornecedor_cotacao->id_fornecedor);
        $validacao->setData("id_cotacao", $fornecedor_cotacao->id_cotacao);
      
        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_cotacao")->isVazio();
        
        $fornecedor = FornecedorCotacaoService::getFornecedorCotacao($fornecedor_cotacao->id_cotacao, $fornecedor_cotacao->id_fornecedor);
        if($fornecedor){
            $validacao->getData("id_fornecedor")->isUnico(1,"Esta Fornecedor Já está nessa cotação");
        }
        
        return $validacao;
        
    }
}

