<?php
namespace app\controllers;
use app\core\Controller;
use app\models\service\ChamadoService;
use app\models\service\AgendaService;
use app\models\service\Service;
use app\util\UtilService;



class HomeController extends Controller{  
    
    public function __construct(){
    $this->usuario = UtilService::getUsuario();
    if(!$this->usuario){
        $this->redirect(URL_BASE ."login");
        exit;   
    }
    }
    
   public function index(){
       $data1 = date('Y-m-01');
       $data2 = date('Y-m-d');
       $dados["lista"] = ChamadoService::listaTotal(); 
       $dados["listachamados"] = ChamadoService::listachamados(); 
       $dados["listast"] = ChamadoService::listast();
       $dados["listaa"] = ChamadoService::listaAbertos();  
       $dados["listaf"] = ChamadoService::listaFechados();  
       $dados["chamado"]  = Service::getTotal("posvenda_chamado", "somatoria", 1);
       $dados["aberto"]  = Service::getSomaExeto("posvenda_chamado", "somatoria","id_status_atendimento",6);
       $dados["fechados"]  = Service::getSoma("posvenda_chamado", "somatoria","id_status_atendimento",6);
       
       //dash agenda
       
       $dados["listaconcluidos"] = AgendaService::Concluidos();
       $dados["meses"] = AgendaService::Meses();
       $dados["meses5"] = AgendaService::Meses5();
       $dados["meses6"] = AgendaService::Meses6();
       $dados["meses17"] = AgendaService::Meses17();
       $dados["listaabertos"] = AgendaService::Abertos();
       $dados["listaeventos"] = AgendaService::listaTotal();
       $dados["eventos"] = AgendaService::Eventos();
       $dados["concluidos"] = AgendaService::Concluido();
       $dados["aconcluirem"] = AgendaService::Aconcluir();
       $dados["responsavel"] = AgendaService::Responsavel();
    
       $dash = $_SESSION[SESSION_LOGIN]->dash;
       $dados["view"]   = "$dash";
	   $this->load("template", $dados);
   } 
   
}
?>