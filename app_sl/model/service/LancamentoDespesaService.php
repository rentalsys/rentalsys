<?php
namespace app\models\service;

use app\models\dao\LancamentoDespesaDao;
use app\models\validacao\LancamentoDespesaValidacao;

class LancamentoDespesaService{
    public static function salvar($lancamento, $campo, $tabela){
        $validacao = LancamentoDespesaValidacao::salvar($lancamento);  
        
        $id = Service::salvar($lancamento, $campo, $validacao->listaErros(), $tabela);
        if($id){
            $fornecedor = Service::get("contato","id_contato", $lancamento->id_fornecedor);
            $despesa    = Service::get("fin_despesa","id_despesa", $lancamento->id_despesa) ;
            
            if($lancamento->pago=="S"){
                //Lançamento no Livro Diario
                $livro_diario = new \stdClass();
                $livro_diario->id_livro_diario        =  null;
                $livro_diario->id_conta_debito 	      = $despesa->id_conta;
                $livro_diario->id_conta_credito 	  = 5;
                $livro_diario->data 	              = hoje();
                $livro_diario->valor 	              = $lancamento->valor;
                $livro_diario->historico 	          = "Pagamento de Despesa Em dinheiro, Lançamento num: " . $id;
                
                LivroDiarioService::salvar($livro_diario, "id_livro_diario", "livro_diario");
                
            }else{
                //Lançamento no Livro Diario
                $livro_diario = new \stdClass();
                $livro_diario->id_livro_diario        =  null;
                $livro_diario->id_conta_debito 	      = $despesa->id_conta;
                $livro_diario->id_conta_credito 	  = $fornecedor->id_conta_fornecedor;
                $livro_diario->data 	              = hoje();
                $livro_diario->valor 	              = $lancamento->valor;
                $livro_diario->historico 	          = "Pagamento de Despesa a Prazo, Lançamento num: " . $id;
                
                LivroDiarioService::salvar($livro_diario, "id_livro_diario", "livro_diario");
            }
        }
        
        return $id;
    }
    public static function lista(){
        $dao = new LancamentoDespesaDao();
        return $dao->lista();
    }
    
    public static function getLancamentoDespesa($id_lancamento){
        $dao = new LancamentoDespesaDao();
        return $dao->getLancamentoDespesa($id_lancamento);
    }
}

