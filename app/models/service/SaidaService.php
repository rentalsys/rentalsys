<?php
namespace app\models\service;

use app\models\dao\SaidaDao;
use app\models\validacao\SaidaValidacao;

class SaidaService{
    public static function salvar($saida, $campo, $tabela){
        $validacao = SaidaValidacao::salvar($saida);
        $id_saida = Service::salvar($saida, $campo, $validacao->listaErros(), $tabela);
        if($id_saida){
            
            $saldo_anterior = MovimentoService::saldoEstoque($saida->id_produto);
            $movimento = new \stdClass();
            $movimento->id_localizacao      = $saida->id_localizacao;
            $movimento->id_tipo_movimento   = 5; //id_saida avulsa           
            $movimento->id_saida_avulsa   = $id_saida;
            $movimento->entrada_saida       = "S";
            $movimento->id_produto          = $saida->id_produto;
            $movimento->data_movimento      = $saida->data_saida;
            $movimento->qtde_movimento      = $saida->qtde_saida;
            $movimento->valor_movimento     = $saida->valor_saida;
            $movimento->subtotal_movimento  = $saida->subtotal_saida;
            $movimento->descricao           = "Saida Avulsa ID: ".$id_saida;
            $movimento->saldoestoque        = $saldo_anterior-$movimento->qtde_movimento;
            Service::inserir(objToArray($movimento), "movimento");
            ProdutoService::atualizarEstoque( $movimento->id_produto, -$movimento->qtde_movimento);
            ProdutoLocalizacaoService::atualizarEstoque( $movimento->id_produto, $movimento->id_localizacao , -$movimento->qtde_movimento);
        }
        return $id_saida;
        
    }
    
    
    
    
    
    
    
    public static function lista(){
        $dao = new SaidaDao();
        return $dao->lista();
    }
}

