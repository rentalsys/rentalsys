<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemPedidoService;
use app\models\service\LancamentoReceberService;
use app\models\service\LivroDiarioService;
use app\models\service\ParcelaReceberService;
use app\models\service\PedidoService;
use app\models\service\Service;


class PedidoController extends Controller{
   private $tabela = "pedido";
   private $campo  = "id_pedido";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Pedido/Index";
       $this->load("template", $dados);
    }
    
    public function pendente(){
        $dados["lista"] = PedidoService::listaPendente();
        $dados["view"]  = "Pedido/Pendente";
        $this->load("template", $dados);
    }
    
    public function recusado(){
        $dados["lista"] = PedidoService::listaRecusado();
        $dados["view"]  = "Pedido/Recusado";
        $this->load("template", $dados);
    }
    
    public function excluido(){
        $dados["lista"] = PedidoService::listaExcluido();
        $dados["view"]  = "Pedido/Excluido";
        $this->load("template", $dados);
    }
    
    public function sem_estoque($id_pedido){
        $pedido = PedidoService::getPedido($id_pedido);
        if(!$pedido){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        if($pedido->id_status >2){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        
        $dados["itens"]    = ItemPedidoService::listaPorPedidoLocalizacao($id_pedido);               
        $dados["view"]  = "Pedido/SemEstoque";
        $this->load("template", $dados);
    }
    public function atender($id_pedido){
        $pedido = PedidoService::getPedido($id_pedido);
        if(!$pedido){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        
        if($pedido->id_status!=2){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        
        $dados["pedido"]   = $pedido;
        $dados["itens"]    = ItemPedidoService::listaItemComLocalizacao($id_pedido);
        $dados["view"]      = "Pedido/Atender";
        $this->load("template", $dados);
    }
    
    public function recusar($id_pedido){
        $pedido = PedidoService::getPedido($id_pedido);
        if(!$pedido){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        
        Service::editar(["id_status"=>7,"id_pedido"=>$id_pedido], "id_pedido", "pedido");
        $this->redirect(URL_BASE."pedido/recusado");
    }
    
    public function marcar_excluir($id_pedido){
        $pedido = PedidoService::getPedido($id_pedido);
        if(!$pedido){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        
        Service::editar(["id_status"=>6,"id_pedido"=>$id_pedido], "id_pedido", "pedido");
        $this->redirect(URL_BASE."pedido/recusado");
    }
    
    public function verificar_pedido(){
        $id_pedido = $_POST["id_pedido"];
        $id_produto = $_POST["id_produto"];
        $id_localizacao = $_POST["id_localizacao"];
        
        $pedido = PedidoService::getPedido($id_pedido);
        if(!$pedido){
            $this->redirect(URL_BASE."pedido/pendente");
        }
        
        for($i=0; $i<count($id_localizacao); $i++){
            $produto[$id_produto[$i]] = $id_localizacao[$i];
        }
        //Atualizar o campo id_localização nos itens
        $itens = ItemPedidoService::listaPorPedido($id_pedido);
        foreach($itens as $item){
            Service::editar(["id_localizacao"=>$produto[$item->id_produto], "id_item" =>$item->id_item], "id_item", "item");
        }        

        //Verificar se todos os itens possuem estoque
        $itens = ItemPedidoService::listaPorPedidoLocalizacao($id_pedido); 
        
        foreach($itens as $item){
           $saldo = $item->estoque - $item->qtde;
           if($saldo<=0){
               $this->redirect(URL_BASE."pedido/sem_estoque/" . $id_pedido);
           }
        }
        
        PedidoService::atenderPedido($id_pedido);
        Service::editar(["id_status" =>4, "id_pedido"=>$id_pedido], "id_pedido", "pedido");
        $this->redirect(URL_BASE."pedido/pendente");
    }
    
    public function solicitarProducao($id_pedido){        
        $pedido = PedidoService::getPedido($id_pedido);
        if(!$pedido){
            $this->redirect(URL_BASE."pedido/pendente");
        }        
        PedidoService::solicitarProducao($id_pedido);        
        $this->redirect(URL_BASE."pedido/pendente");
    }
    
    public function create(){
        $dados["pedido"] = Flash::getForm();
        $dados["view"] = "Pedido/Create";
        $this->load("template", $dados);
    }
    
    
    
    public function salvar(){
        $pedido = new \stdClass();
        $pedido->id_pedido        = $_POST["id_pedido"];
        $pedido->pedido 		    = $_POST['pedido'];
      
        
        Flash::setForm($pedido);
        if(PedidoService::salvar($pedido, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."pedido");
        }else{
            if(!$pedido->id_pedido){
                $this->redirect(URL_BASE."pedido/create");
            }else{
                $this->redirect(URL_BASE."pedido/edit/".$pedido->id_pedido);
            }
        }
    }
    
    public function faturarPedido(){
        $lancamento = new \stdClass();
        $lancamento->id_lancamento_receber     = null;
        $lancamento->id_cliente              = $_POST["id_cliente"];
        $lancamento->id_pedido               = $_POST["id_pedido"];
        $lancamento->id_documento_origem     = $_POST["id_documento_origem"];
        $lancamento->qtde_parcela            = $_POST["qtde_parcela"];
        $lancamento->valor_total             = $_POST["valor_total"];
        $lancamento->data_lancamento         = hoje();
        $lancamento->numero_documento        = $_POST["numero_documento"];
        $lancamento->primeiro_vencimento     = $_POST["primeiro_vencimento"];
        $lancamento->juros                   = $_POST["juros"];
        $lancamento->desconto                = $_POST["desconto"];
        $lancamento->multa                   = $_POST["multa"];
        $lancamento->intervalo_entre_parcela = $_POST["intervalo_entre_parcela"];
        if($lancamento->intervalo_entre_parcela <=0){
            $lancamento->saldo_restante          = 0;
        }else{
            $lancamento->saldo_restante          = $lancamento->valor_total;
        }
        $lancamento->finalizado              = "S";
        $lancamento->valor_a_receber          = $lancamento->valor_total + $lancamento->juros + $lancamento->multa - $lancamento->desconto;
        $lancamento->data_ult_parcela        = somarData($lancamento->primeiro_vencimento, $lancamento->qtde_parcela * $lancamento->intervalo_entre_parcel);

        //Faz um lançamento no contas a Receber
        $id = LancamentoReceberService::salvar($lancamento, "id_lancamento_receber", "fin_lancamento_receber");
        $lancamento->id_lancamento_receber = $id;
        if($id){            
            if($lancamento->intervalo_entre_parcela <=0){
                //Pagamento á vista
                ParcelaReceberService::parcelaAvista($lancamento);
              
                //Lançamento no Livro Diario
                $livro_diario = new \stdClass();
                $livro_diario->id_livro_diario        =  null;
                $livro_diario->id_conta_debito 	      = 5;
                $livro_diario->id_conta_credito 	  = 153;
                $livro_diario->data 	              = hoje();
                $livro_diario->valor 	              = $lancamento->valor_a_receber;
                $livro_diario->historico 	          = "Venda de Mercadoria em Dinheiro, pedido num: " . $lancamento->id_pedido;                
                
                LivroDiarioService::salvar($livro_diario, "id_livro_diario", "livro_diario");
                
            }else{            
                //Gera as parcelas            
                ParcelaReceberService::gerarParcela($lancamento);
                //Lançamento no Livro Diario
                $livro_diario = new \stdClass();
                $livro_diario->id_livro_diario        = null;
                $livro_diario->id_conta_debito 	      = 249;
                $livro_diario->id_conta_credito 	  = 153;
                $livro_diario->data 	              = hoje();
                $livro_diario->valor 	              = $lancamento->valor_a_receber;
                $livro_diario->historico 	          = "Venda de Mercadoria a Prazo, pedido num: " . $lancamento->id_pedido;
                LivroDiarioService::salvar($livro_diario, "id_livro_diario", "livro_diario");
            }
            
            //Dar entrada no estoque
            PedidoService::finalizarPedido($lancamento->id_pedido);
            
            //parte Contábil
            
            
            
            
            
            $this->redirect(URL_BASE."lancamentoreceber");
        }
        
       
    }
    
    public function excluir($id){
        $foi = Service::excluir($this->tabela, $this->campo, $id);
        if($foi){
            Service::excluir("item", "id_pedido", $id);
        }
        $this->redirect(URL_BASE."pedido/pendente");
    }
}

