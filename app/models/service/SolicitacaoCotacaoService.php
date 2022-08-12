<?php
namespace app\models\service;

use app\models\dao\SolicitacaoCotacaoDao;
use app\models\validacao\SolicitacaoCotacaoValidacao;
use app\core\Flash;


class SolicitacaoCotacaoService{
    public static function salvar($solicitacaocotacao, $campo, $tabela){
        $validacao = SolicitacaoCotacaoValidacao::salvar($solicitacaocotacao);
        $id_solicitacao_cotacao = Service::salvar($solicitacaocotacao, $campo, $validacao->listaErros(), $tabela);
        if($id_solicitacao_cotacao){
            Service::editar(["id_status_solicitacao"=>2, "id_solicitacao"=>$solicitacaocotacao->id_solicitacao], "id_solicitacao", "compra_solicitacao");
        }
    }
    public static function listaPorCotacao($id_cotacao){
        $dao = new SolicitacaoCotacaoDao();
        return $dao->listaPorCotacao($id_cotacao);
        
    }
    
    public static function excluir($id_solicitacao_cotacao, $id_solicitacao){
        $id = Service::excluir("compra_solicitacao_cotacao", "id_solicitacao_cotacao", $id_solicitacao_cotacao);
        if($id){
            Service::editar(["id_status_solicitacao"=>1, "id_solicitacao"=>$id_solicitacao], "id_solicitacao", "compra_solicitacao");
            Flash::getMsg();
        }
    }
    
    public static function inserirEmMassa($id_cotacao, $solicitacoes){
        for($i=0; $i < count($solicitacoes); $i++){
            $solicitacao = Service::get("compra_solicitacao", "id_solicitacao", $solicitacoes[$i]);
            if($solicitacao->id_status_solicitacao == 1){
                $id = Service::inserir(["id_solicitacao"=>$solicitacoes[$i], "id_cotacao"=>$id_cotacao], "compra_solicitacao_cotacao");
                if($id){
                    Service::editar(["id_status_solicitacao"=>2, "id_solicitacao"=>$solicitacoes[$i]],"id_solicitacao" ,"compra_solicitacao");
                }
            }
            
        }
    }
}
?>
