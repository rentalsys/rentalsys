<?php
namespace app\models\service;

use app\models\dao\SaidaDao;
use app\models\entidade\Movimento;
use app\models\validacao\SaidaValidacao;

class SaidaService{
    public static function salvar($saida, $campo, $tabela){
        $validacao  = SaidaValidacao::salvar($saida);     
        $id_saida =  Service::salvar($saida, $campo, $validacao->listaErros(), $tabela);
        if($id_saida){
            //regras
            //localizar o estoque anterior;
            $mov = new Movimento();
            $mov->setId_localizacao($saida->id_localizacao);
            $mov->setId_tipo_movimento(5);
            $mov->setId_entrada_avulsa($id_saida);
            $mov->setEntrada_saida("S");
            $mov->setId_produto($saida->id_produto);
            $mov->setData_movimento($saida->data_saida);
            $mov->setQtde_movimento($saida->qtde_saida);
            $mov->setValor_movimento($saida->valor_saida);
            $mov->setSubtotal_movimento($saida->subtotal_saida);
            $mov->setDescricao("Saída Avulsa: : " . $id_saida);
            MovimentoService::inserir($mov);  
          }
        
        return $id_saida;
    }
    public static function listaPorData($data){
        $dao = new SaidaDao();
        return $dao->listaPorData($data);
    }
}

