<?php
namespace app\models\service;

use app\models\dao\EntradaDao;
use app\models\validacao\EntradaValidacao;

class EntradaService{
    public static function salvar($entrada, $campo, $tabela){
        $validacao = EntradaValidacao::salvar($entrada);
        $id_entrada = Service::salvar($entrada, $campo, $validacao->listaErros(), $tabela);
        if($id_entrada){
            
            $saldo_anterior = MovimentoService::saldoEstoque($entrada->id_produto);
            $movimento = new \stdClass();
            $movimento->id_localizacao      = $entrada->id_localizacao;
            $movimento->id_tipo_movimento   = 1; //id_entrada avulsa           
            $movimento->id_entrada_avulsa   = $id_entrada;
            $movimento->entrada_saida       = "E";
            $movimento->id_produto          = $entrada->id_produto;
            $movimento->data_movimento      = $entrada->data_entrada;
            $movimento->qtde_movimento      = $entrada->qtde_entrada;
            $movimento->valor_movimento     = $entrada->valor_entrada;
            $movimento->subtotal_movimento  = $entrada->subtotal_entrada;
            $movimento->descricao           = "Entrada Avulsa ID: ".$id_entrada;
            $movimento->saldoestoque        = $saldo_anterior+$movimento->qtde_movimento;
            Service::inserir(objToArray($movimento), "movimento");
            ProdutoService::atualizarEstoque( $movimento->id_produto, $movimento->qtde_movimento);
            ProdutoLocalizacaoService::atualizarEstoque( $movimento->id_produto, $movimento->id_localizacao , $movimento->qtde_movimento);
        }
        return $id_entrada;
        
    }
    
    
    
    
    
    
    
    public static function lista(){
        $dao = new EntradaDao();
        return $dao->lista();
    }
}

