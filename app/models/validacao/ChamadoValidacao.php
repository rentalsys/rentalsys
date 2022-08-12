<?php
namespace app\models\validacao;

use app\core\Validacao;

class ChamadoValidacao{
    public static function salvar($chamado){
        $validacao = new Validacao();
        
        $validacao->setData("cliente", $chamado->id_cliente);
        $validacao->setData("marca", $chamado->id_marca);
        $validacao->setData("status_atendimento", $chamado->id_status_atendimento);
        $validacao->setData("incidente", $chamado->id_incidente);
        $validacao->setData("num_pedido", $chamado->num_pedido);
        $validacao->setData("id_usuario", $chamado->id_usuario);

        
        //fazendo a validação
        $validacao->getData("chamado")->isVazio();
        $validacao->getData("marca")->isVazio();
        $validacao->getData("status_atendimento")->isVazio();
        $validacao->getData("id_usuario")->isVazio();
        $validacao->getData("num_pedido")->isVazio();
        $validacao->getData("incidente")->isVazio();
        
        return $validacao;
        
    }
}

