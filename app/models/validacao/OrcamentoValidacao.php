<?php
namespace app\models\validacao;

use app\core\Validacao;

class OrcamentoValidacao{
    public static function salvar($orcamento){
        $validacao = new Validacao();
        
        $validacao->setData("pf_pj", $orcamento->pf_pj);

        
        //fazendo a validação
        $validacao->getData("pf_pj")->isVazio();

        
        return $validacao;
        
    }
}

