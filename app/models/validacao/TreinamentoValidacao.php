<?php
namespace app\models\validacao;

use app\core\Validacao;

class TreinamentoValidacao{
    public static function salvar($treinamento){
        $validacao = new Validacao();
        $validacao->setData("cliente", $treinamento->id_cliente);
        
        $validacao->getData("cliente")->isVazio();

        return $validacao;
        
    }
}

