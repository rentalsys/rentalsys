<?php
namespace app\models\validacao;

use app\core\Validacao;

class ParcelaPagarValidacao{
    public static function salvar($parcela){
        $validacao = new Validacao();
        
        $validacao->setData("id_lancamento_pagar", $parcela->id_lancamento_pagar);
        $validacao->setData("numero_parcela", $parcela->numero_parcela);
        $validacao->setData("data_emissao", $parcela->data_emissao);
        $validacao->setData("data_vencimento", $parcela->data_vencimento);
        $validacao->setData("valor_parcela", $parcela->valor_parcela);
        $validacao->setData("data_parcela", $parcela->data_parcela);
        $validacao->setData("valor_juro", $parcela->valor_juro);
        $validacao->setData("valor_multa", $parcela->valor_multa);
        $validacao->setData("valor_desconto", $parcela->valor_desconto);
        $validacao->setData("saldo_devedor", $parcela->saldo_devedor);
        $validacao->setData("quitado", $parcela->quitado);
        
        //fazendo a validação
        $validacao->getData("id_lancamento_pagar")->isVazio();
        $validacao->getData("numero_parcela")->isVazio();
        $validacao->getData("data_emissao")->isVazio();
        $validacao->getData("data_vencimento")->isVazio();
        $validacao->getData("valor_parcela")->isVazio();
        $validacao->getData("data_parcela")->isVazio();
        $validacao->getData("valor_juro")->isVazio();        
        $validacao->getData("valor_multa")->isVazio();
        $validacao->getData("valor_desconto")->isVazio();
        $validacao->getData("saldo_devedor")->isVazio();
        $validacao->getData("quitado")->isVazio();
        
        return $validacao;
        
    }
}

