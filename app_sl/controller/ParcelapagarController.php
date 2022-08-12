<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\LancamentoPagarService;
use app\models\service\ParcelaPagamentoService;
use app\models\service\ParcelaPagarService;
use app\models\service\Service;


class ParcelapagarController extends Controller{
   private $tabela = "fin_parcela_pagar";
   private $campo  = "id_parcela_pagar";   
   
    public function detalhe($id_lancamento){
       $dados["lista"] = ParcelaPagarService::listaPorLancamento($id_lancamento); 
       $dados["view"]  = "ParcelaPagar/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["parcela_pagar"] = Flash::getForm();
        $dados["view"] = "ParcelaPagar/Create";
        $this->load("template", $dados);
    }
    
    public function baixar($id_parcela){
        $parcela_pagar = Service::get($this->tabela, $this->campo, $id_parcela);       
        if(!$parcela_pagar){
            $this->redirect(URL_BASE."parcelapagar");
        }
        
        $dados["lancamento"]    = LancamentoPagarService::getLancamentoPagar($parcela_pagar->id_lancamento_pagar);
        $dados["pagamentos"]    = Service::get("fin_parcela_pagamento","id_parcela_pagar",$id_parcela, true );
        $dados["formaPagto"]    = Service::lista("forma_pagto");
        $dados["parcelapagar"]   = $parcela_pagar;
        $dados["view"]      = "ParcelaPagar/Create";
        $this->load("template", $dados);
    }
    
    public function pagar(){
        $pagamento = new \stdClass();
        $pagamento->id_parcela_pagar        = $_POST["id_parcela_pagar"];
        $pagamento->id_forma_pagto 		    = $_POST['id_forma_pagto'];
        $pagamento->data_pagamento 		    = $_POST['data_pagamento'];
        $pagamento->valor_pago 		        = $_POST['valor_pago'];
        
        $parcela = new \stdClass();
        $parcela->valor_juro 		       = $_POST['juros'];
        $parcela->valor_multa 		       = $_POST['multa'];
        $parcela->valor_desconto 		   = $_POST['desconto'];  
        $parcela->tipo_baixa               = $_POST['id_baixa'];        
        
        
        if(ParcelaPagamentoService::baixar($pagamento, $parcela)){
            $this->redirect(URL_BASE."lancamentopagar");
        }else{
            $this->redirect(URL_BASE."parcelapagar/baixar/".$pagamento->id_parcela_pagar);
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."parcela_pagar");
    }
}

