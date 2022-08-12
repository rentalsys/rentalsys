<?php
namespace app\models\service;

use app\models\dao\EntradaDao;
use app\models\validacao\EntradaValidacao;
use app\models\entidade\Movimento;

class EntradaService{
    public static function salvar($entrada, $campo, $tabela){
        $validacao  = EntradaValidacao::salvar($entrada);     
        $id_entrada =  Service::salvar($entrada, $campo, $validacao->listaErros(), $tabela);
        if($id_entrada){            
            //regras
            //localizar o estoque anterior;
            $mov = new Movimento();
            $mov->setId_localizacao($entrada->id_localizacao);
            $mov->setId_tipo_movimento(1);
            $mov->setId_entrada_avulsa($id_entrada);
            $mov->setEntrada_saida("E");
            $mov->setId_produto($entrada->id_produto);
            $mov->setData_movimento($entrada->data_entrada);
            $mov->setQtde_movimento($entrada->qtde_entrada);
            $mov->setValor_movimento($entrada->valor_entrada);
            $mov->setSubtotal_movimento($entrada->subtotal_entrada);
            $mov->setDescricao("Entrada Avulsa ID: " . $id_entrada);            
            MovimentoService::inserir($mov);            
        
        }
        
        return $id_entrada;
    }
    public static function listaPorData($data){
        $dao = new EntradaDao();
        return $dao->listaPorData($data);
    }
}

