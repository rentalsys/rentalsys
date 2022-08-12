<?php
namespace app\models\validacao;

use app\core\Validacao;

class ParcelaRecebimentoValidacao{
    public static function salvar($parcela){
        $validacao = new Validacao();
        
        $validacao->setData("id_parcela_receber", $parcela->id_parcela_receber);
        $validacao->setData("id_tipo_recebimento", $parcela->id_tipo_recebimento);
        $validacao->setData("data_recebimento", $parcela->data_recebimento);
        $validacao->setData("valor_recebido", $parcela->valor_recebido);
        
        //fazendo a validação
        $validacao->getData("id_parcela_receber")->isVazio();
        $validacao->getData("id_tipo_recebimento")->isVazio();
        $validacao->getData("data_recebimento")->isVazio();
        $validacao->getData("valor_recebido")->isVazio();
        
        return $validacao;
        
    }
}

