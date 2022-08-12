<?php
namespace app\models\service;

use app\models\validacao\CotacaoValidacao;
use app\models\dao\CotacaoDao;

class CotacaoService{
    public static function salvar($cotacao, $campo, $tabela){
        $validacao = CotacaoValidacao::salvar($cotacao);     
        return Service::salvar($cotacao, $campo, $validacao->listaErros(), $tabela);
    }
    public static function listaPorStatus($id_status){
        $dao = new CotacaoDao();
        return $dao->listaPorStatus($id_status);
    }
    public static function lista(){
        $dao = new CotacaoDao();
        return $dao->lista();
    }
    
    public static function listaComparacaoPrecos($id_cotacao){
        $solicitacoes = SolicitacaoService::listaPorCotacao($id_cotacao);
        $menoresPrecos = ItemCotacaoService::agrupaMenorPreco($id_cotacao);
        if($menoresPrecos){
            foreach($menoresPrecos as $m){
                $menor[$m->id_solicitacao] = $m->menor;
            }
        }
        
        foreach($solicitacoes as $solicitacao){
            $solicitacao->fornecedores = ItemCotacaoService::listaFornecedorSolicitacaoCotacao($id_cotacao, $solicitacao->id_solicitacao);
            if(!$solicitacao->id_fornecedor){
                $solicitacao->menor_preco = ItemCotacaoService::getMenorPreco($id_cotacao,$solicitacao->id_solicitacao, $menor[$solicitacao->id_solicitacao]);
            }else{
                $solicitacao->menor_preco = ItemCotacaoService::getVencedor($solicitacao->id_solicitacao);
            }
            
        }
        
        return $solicitacoes;
    }
}

