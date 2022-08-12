<?php
namespace app\models\service;

use app\models\validacao\TipoMovimentoValidacao;

class TipoMovimentoService{
    public static function salvar($tipo_movimento, $campo, $tabela){
        $validacao = TipoMovimentoValidacao::salvar($tipo_movimento);     
        return Service::salvar($tipo_movimento, $campo, $validacao->listaErros(), $tabela);
    }
}

