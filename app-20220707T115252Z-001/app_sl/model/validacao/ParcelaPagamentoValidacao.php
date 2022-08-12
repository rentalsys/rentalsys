<?php
namespace app\models\validacao;

use app\core\Validacao;

class ParcelaPagamentoValidacao{
    public static function salvar($parcela){
        $validacao = new Validacao();
        
        $validacao->setData("id_parcela_pagar", $parcela->id_parcela_pagar);
        $validacao->setData("id_forma_pagto", $parcela->id_forma_pagto);
        $validacao->setData("data_pagamento", $parcela->data_pagamento);
        $validacao->setData("valor_juro", $parcela->valor_juro);
        $validacao->setData("valor_multa", $parcela->valor_multa);
        $validacao->setData("valor_desconto", $parcela->valor_desconto);
        $validacao->setData("valor_pago", $parcela->valor_pago);
        
        //fazendo a validação
        $validacao->getData("id_parcela_pagar")->isVazio();
        $validacao->getData("id_forma_pagto")->isVazio();
        $validacao->getData("data_pagamento")->isVazio();
        $validacao->getData("valor_juro")->isVazio();        
        $validacao->getData("valor_multa")->isVazio();
        $validacao->getData("valor_desconto")->isVazio();
        $validacao->getData("valor_pago")->isVazio();
        
        return $validacao;
        
    }
}

