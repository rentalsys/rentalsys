<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class SolicitacaocotacaoValidacao{
    public static function salvar($solicitacao_cotacao){
        $validacao = new Validacao();
        
        $validacao->setData("id_solicitacao", $solicitacao_cotacao->id_solicitacao);
        $validacao->setData("id_cotacao", $solicitacao_cotacao->id_cotacao);
      
        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_cotacao")->isVazio();
        
        $solicitacao = Service::get("compra_solicitacao", "id_solicitacao", $solicitacao_cotacao->id_solicitacao);
        if($solicitacao->id_status_solicitacao != 1){
            $validacao->getData("id_solicitacao")->isUnico(1,"Esta Solicitação Já foi utilizada");
        }
        
        return $validacao;
        
    }
}

