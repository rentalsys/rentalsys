<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\LancamentoReceberService;
use app\models\service\ParcelaReceberService;
use app\models\service\ParcelaRecebimentoService;
use app\models\service\Service;


class ParcelareceberController extends Controller{
   private $tabela = "fin_parcela_receber";
   private $campo  = "id_parcela_receber";   
   
    public function detalhe($id_lancamento){
       $dados["lista"] = ParcelaReceberService::listaPorLancamento($id_lancamento); 
       $dados["view"]  = "ParcelaReceber/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["parcela_receber"] = Flash::getForm();
        $dados["view"] = "ParcelaReceber/Create";
        $this->load("template", $dados);
    }
    
    public function baixar($id_parcela){
        $parcela_receber = Service::get($this->tabela, $this->campo, $id_parcela);       
        if(!$parcela_receber){
            $this->redirect(URL_BASE."parcelareceber");
        }
       
        $dados["lancamento"]    = LancamentoReceberService::getLancamentoReceber($parcela_receber->id_lancamento_receber);
        $dados["recebimentos"]    = Service::get("fin_parcela_recebimento","id_parcela_receber",$id_parcela, true );
        $dados["formaPagto"]    = Service::lista("forma_pagto");
        $dados["parcelareceber"]   = $parcela_receber;
        $dados["view"]      = "ParcelaReceber/Create";
        $this->load("template", $dados);
    }
    
    public function receber(){
        $recebimento = new \stdClass();
        $recebimento->id_parcela_receber        = $_POST["id_parcela_receber"];
        $recebimento->id_tipo_recebimento 		= $_POST['id_tipo_recebimento'];
        $recebimento->data_recebimento 		    = $_POST['data_recebimento'];
        $recebimento->valor_recebido 		    = $_POST['valor_recebido'];
        
        $parcela = new \stdClass();
        $parcela->valor_juro 		       = $_POST['juros'];
        $parcela->valor_multa 		       = $_POST['multa'];
        $parcela->valor_desconto 		   = $_POST['desconto'];  
        $parcela->tipo_baixa               = $_POST['id_baixa'];        
        
        
        
        if(ParcelaRecebimentoService::baixar($recebimento, $parcela)){
            $this->redirect(URL_BASE."lancamentoreceber");
        }else{
            $this->redirect(URL_BASE."parcelareceber/baixar/".$recebimento->id_parcela_receber);
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."parcela_receber");
    }
}

