<?php
namespace app\models\service;

use app\models\dao\ParcelaReceberDao;
use app\models\validacao\ParcelaReceberValidacao;

class ParcelaReceberService{
    public static function salvar($parcela, $campo, $tabela){
        $validacao = ParcelaReceberValidacao::salvar($parcela);     
        return Service::salvar($parcela, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaPorLancamento($id_lancamento){
        $dao = new ParcelaReceberDao();
        return $dao->listaPorLancamento($id_lancamento);
    }
    
    public static function gerarParcela($lancamento){
        $soma = 0;        
        for($i=0; $i<$lancamento->qtde_parcela; $i++){
            $parcela = new \stdClass();
            $parcela->id_lancamento_receber = $lancamento->id_lancamento_receber;
            $parcela->numero_parcela      = $i+1;
            $parcela->data_emissao        = $lancamento->data_lancamento;
            $parcela->data_vencimento     = somarData($lancamento->primeiro_vencimento, $lancamento->intervalo_entre_parcela * $i);
            $parcela->valor_parcela       = floor($lancamento->valor_a_receber/$lancamento->qtde_parcela);
            $parcela->saldo_devedor       = $parcela->valor_parcela;
            $soma += $parcela->valor_parcela;
            $id = Service::inserir(objToArray($parcela), "fin_parcela_receber");
        }
        
        //$ultima_parcela = $lancamento->valor_a_receber - $soma;
    }
    
    public static function parcelaAvista($lancamento){
            $parcela = new \stdClass();
            $parcela->id_lancamento_receber = $lancamento->id_lancamento_receber;
            $parcela->numero_parcela      = 1;
            $parcela->data_emissao        = $lancamento->data_lancamento;
            $parcela->data_vencimento     = $lancamento->data_lancamento;
            $parcela->valor_parcela       = $lancamento->valor_a_receber;
            $parcela->valor_recebido      = $lancamento->valor_a_receber;
            $parcela->quitado             = "S";
            $parcela->saldo_devedor       = 0;
            $parcela->valor_total_receber = $lancamento->valor_a_receber;
            
            return Service::inserir(objToArray($parcela), "fin_parcela_receber");        
    }
}

