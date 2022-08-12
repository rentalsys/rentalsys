<?php
namespace app\models\validacao;

use app\core\Validacao;

class SolicitacaoValidacao{
    public static function salvar($solicitacao){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $solicitacao->id_produto);
        $validacao->setData("id_status_solicitacao", $solicitacao->id_status_solicitacao);
        $validacao->setData("qtde", $solicitacao->qtde);
        $validacao->setData("data_solicitacao", $solicitacao->data_solicitacao);

        

        
        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_status_solicitacao")->isVazio();
        $validacao->getData("qtde")->isVazio();
        $validacao->getData("data_solicitacao")->isVazio();

        
        return $validacao;
        
    }
}

