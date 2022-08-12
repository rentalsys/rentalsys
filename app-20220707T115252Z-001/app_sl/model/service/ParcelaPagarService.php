<?php
namespace app\models\service;

use app\models\dao\ParcelaPagarDao;
use app\models\validacao\ParcelaPagarValidacao;

class ParcelaPagarService{
    public static function salvar($parcela, $campo, $tabela){
        $validacao = ParcelaPagarValidacao::salvar($parcela);     
        return Service::salvar($parcela, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaPorLancamento($id_lancamento){
        $dao = new ParcelaPagarDao();
        return $dao->listaPorLancamento($id_lancamento);
    }
    public static function gerarParcela($lancamento){
        $soma = 0;        
        for($i=0; $i<$lancamento->qtde_parcela; $i++){
            $parcela = new \stdClass();
            $parcela->id_lancamento_pagar = $lancamento->id_lancamento_pagar;
            $parcela->numero_parcela      = $i+1;
            $parcela->data_emissao        = $lancamento->data_lancamento;
            $parcela->data_vencimento     = somarData($lancamento->primeiro_vencimento, $lancamento->intervalo_entre_parcela * $i);
            $parcela->valor_parcela       = floor($lancamento->valor_a_pagar/$lancamento->qtde_parcela);
            $parcela->saldo_devedor       = $parcela->valor_parcela;
            $soma += $parcela->valor_parcela;
            $id = Service::inserir(objToArray($parcela), "fin_parcela_pagar");
        }
        
        //$ultima_parcela = $lancamento->valor_a_pagar - $soma;
    }
    
    public static function parcelaAvista($lancamento){
        $parcela = new \stdClass();
        $parcela->id_lancamento_pagar = $lancamento->id_lancamento_pagar;
        $parcela->numero_parcela      = 1;
        $parcela->data_emissao        = $lancamento->data_lancamento;
        $parcela->data_vencimento     = $lancamento->data_lancamento;
        $parcela->valor_parcela       = $lancamento->valor_a_pagar;
        $parcela->valor_pago          = $lancamento->valor_a_pagar;
        $parcela->quitado             = "S";
        $parcela->saldo_devedor       = 0;
        $parcela->valor_total_pagar = $lancamento->valor_a_pagar;
        
        return Service::inserir(objToArray($parcela), "fin_parcela_pagar");
    }
    
    
}

