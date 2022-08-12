<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProfessorValidacao{
    public static function salvar($agenda){
        $validacao = new Validacao();
        $validacao->setData("responsavel", $agenda->id_responsavel);
        $validacao->setData("data_evento", $agenda->data_evento);
        $validacao->setData("usuario", $agenda->id_usuario);
        $validacao->setData("horario", $agenda->id_horario);
        $validacao->setData("formato", $agenda->id_formato);
        $validacao->setData("ocupacao", $agenda->id_ocupacao);
        $validacao->setData("instrutor", $agenda->id_instrutor);
        $validacao->setData("cliente", $agenda->id_cliente);
        $validacao->setData("produto", $agenda->id_produto);
        
        
        
        //fazendo a validação
        if($agenda->id_ocupacao != 1){} else {
            $validacao->getData("cliente")->isVazio();
            $validacao->getData("produto")->isVazio();
        }
        
        //fazendo a validação
        $validacao->getData("data_evento")->isVazio();
        $validacao->getData("ocupacao")->isVazio();
        $validacao->getData("responsavel")->isVazio();   
        $validacao->getData("usuario")->isVazio();
        $validacao->getData("horario")->isVazio();
        $validacao->getData("formato")->isVazio(); 
        return $validacao;
        
    }
}

