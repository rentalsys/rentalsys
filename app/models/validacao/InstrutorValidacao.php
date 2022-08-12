<?php
namespace app\models\validacao;

use app\core\Validacao;

class InstrutorValidacao{
    public static function salvar($instrutor){
        $validacao = new Validacao();
        $validacao->setData("responsavel", $instrutor->id_responsavel);
        $validacao->setData("cliente", $instrutor->id_cliente);
        $validacao->setData("produto", $instrutor->id_produto);
        $validacao->setData("data_evento", $instrutor->data_evento);
        $validacao->setData("usuario", $instrutor->id_usuario);
        $validacao->setData("horario", $instrutor->id_horario);
        $validacao->setData("formato", $instrutor->id_formato);
        $validacao->setData("ocupacao", $instrutor->id_ocupacao);
        
        
        
        //fazendo a validação
        if($instrutor->id_ocupacao == 2){} else {
            $validacao->getData("cliente")->isVazio();
            $validacao->getData("produto")->isVazio();
        }

        $validacao->getData("data_evento")->isVazio();
        $validacao->getData("responsavel")->isVazio();
        $validacao->getData("usuario")->isVazio();
        $validacao->getData("horario")->isVazio();
        $validacao->getData("formato")->isVazio();
        return $validacao;
        
    }
}

