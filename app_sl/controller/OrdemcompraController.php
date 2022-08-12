<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemOrdemCompraService;
use app\models\service\LancamentoPagarService;
use app\models\service\LivroDiarioService;
use app\models\service\OrdemCompraService;
use app\models\service\ParcelaPagarService;
use app\models\service\Service;


class OrdemcompraController extends Controller{
   private $tabela = "ordem_compra";
   private $campo  = "id_ordem_compra";   
   
    public function index(){
       $dados["lista"]        = OrdemCompraService::lista();
       $dados["fornecedores"] = Service::get("contato", "eh_fornecedor", "S", true);
       $dados["view"]  = "Ordem_Compra/Index";
       $this->load("template", $dados);
    }
    
    public function create($id_ordem_compra){ 
        $ordecompra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordecompra){
            $this->redirect(URL_BASE."ordem_compra");
        }
        
        $dados["ordem_compra"] = $ordecompra;
        $dados["lista"] = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        $dados["view"] = "Ordem_Compra/Create";
        $this->load("template", $dados);
    }
    
    public function novo(){
        $id_fornecedor = $_POST["id_fornecedor"];
        $ordecompra = OrdemCompraService::getOrdemCompraAberta();
        if(!$ordecompra){
            $id_ordem_compra= Service::inserir(["id_fornecedor"=>$id_fornecedor,"avulsa"=>"S","id_status_ordem_compra"=>1,
                "finalizada"=>"N","data_emissao"=>hoje()], "ordem_compra");
            $ordecompra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        }
        $this->redirect(URL_BASE ."ordemcompra/create/" . $ordecompra->id_ordem_compra);
    }
    public function edit($id){
        $ordem_compra = Service::get($this->tabela, $this->campo, $id);       
        if(!$ordem_compra){
            $this->redirect(URL_BASE."ordem_compra");
        }
        
        $dados["ordem_compra"]   = $ordem_compra;
        $dados["view"]      = "Ordem_Compra/Create";
        $this->load("template", $dados);
    }
    
    
    public function salvar(){
        $ordem_compra = new \stdClass();
        $ordem_compra->id_ordem_compra        = $_POST["id_ordem_compra"];
        $ordem_compra->ordem_compra 		    = $_POST['ordem_compra'];
      
        
        Flash::setForm($ordem_compra);
        if(OrdemCompraService::salvar($ordem_compra, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."ordem_compra");
        }else{
            if(!$ordem_compra->id_ordem_compra){
                $this->redirect(URL_BASE."ordem_compra/create");
            }else{
                $this->redirect(URL_BASE."ordem_compra/edit/".$ordem_compra->id_ordem_compra);
            }
        }
    }
    
    public function finalizar($id_ordem_compra){
        Service::editar(["finalizada" =>"S", "id_status_ordem_compra"=>2,"id_ordem_compra"=>$id_ordem_compra], "id_ordem_compra", "ordem_compra");
        $this->redirect(URL_BASE."ordemcompra");
    }
    
    public function detalhe($id_ordem_compra){
        $ordecompra = OrdemCompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordecompra){
            $this->redirect(URL_BASE."ordemcompra");
        }
        
        $dados["ordem_compra"] = $ordecompra;
        $dados["lista"] = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        $dados["view"] = "Ordem_Compra/Aprovar";
        $this->load("template", $dados);
    }
    
    public function aprovarOrdemCompra(){
       $ordem = new \stdClass();
       $ordem->id_ordem_compra      = $_POST["id_ordem_compra"];
       $ordem->data_aprovacao       = hoje();
       $ordem->id_status_ordem_compra = 3;
      
       $salvar = Service::editar(objToArray($ordem), $this->campo, $this->tabela);
       if($salvar){
           Flash::setMsg("Ordem de Compra aprovada com sucesso");
           //Enviar o email para o fornecedora
           $this->redirect(URL_BASE."financeiro/lista_aprovar_ordem_compra");
       }
       
       
    }
    
    public function faturarOrdemCompra(){
        $lancamento = new \stdClass();
        $lancamento->id_lancamento_pagar     = null;
        $lancamento->id_fornecedor           = $_POST["id_fornecedor"];
        $lancamento->id_ordem_compra         = $_POST["id_ordem_compra"];
        $lancamento->id_documento_origem     = $_POST["id_documento_origem"];
        $lancamento->qtde_parcela            = $_POST["qtde_parcela"];
        $lancamento->valor_total             = $_POST["valor_total"];        
        $lancamento->valor_pago              = 0;
        $lancamento->data_lancamento         = hoje();
        $lancamento->numero_documento        = $_POST["numero_documento"];
        $lancamento->primeiro_vencimento     = $_POST["primeiro_vencimento"];
        $lancamento->data_ult_parcela        = $_POST["data_ult_parcela"];
        $lancamento->juros                   = $_POST["juros"];
        $lancamento->desconto                = $_POST["desconto"];
        $lancamento->multa                   = $_POST["multa"];
        $lancamento->saldo_restante          = $lancamento->valor_total - $lancamento->valor_pago;
        $lancamento->intervalo_entre_parcela = $_POST["intervalo_entre_parcela"];
        $lancamento->finalizado              = "S";        
        $lancamento->valor_a_pagar           = $lancamento->valor_total + $lancamento->juros + $lancamento->multa - $lancamento->desconto;
        $lancamento->data_ult_parcela        = somarData($lancamento->primeiro_vencimento, $lancamento->qtde_parcela * $lancamento->intervalo_entre_parcela);
        
        //Faz um lançamento no contas a pagar
        $id = LancamentoPagarService::salvar($lancamento, "id_lancamento_pagar", "fin_lancamento_pagar");
        $lancamento->id_lancamento_pagar = $id;
        if($id){
            if($lancamento->intervalo_entre_parcela <=0){
                //Pagamento á vista
                ParcelaPagarService::parcelaAvista($lancamento);               
                
                //Lançamento no Livro Diario
                $livro_diario = new \stdClass();
                $livro_diario->id_livro_diario        =  null;
                $livro_diario->id_conta_debito 	      = 250;
                $livro_diario->id_conta_credito 	  = 5;
                $livro_diario->data 	              = hoje();
                $livro_diario->valor 	              = $lancamento->valor_a_pagar;
                $livro_diario->historico 	          = "Compra de Matéria-Prima em Dinheiro, Ordem de Compra num: " . $lancamento->id_ordem_compra;
                
                LivroDiarioService::salvar($livro_diario, "id_livro_diario", "livro_diario");
                
            }else{
                //Gera as parcelas
                ParcelaPagarService::gerarParcela($lancamento);
                //Lançamento no Livro Diario
                $livro_diario = new \stdClass();
                $livro_diario->id_livro_diario        = null;
                $livro_diario->id_conta_debito 	      = 25;
                $livro_diario->id_conta_credito 	  = 250;
                $livro_diario->data 	              = hoje();
                $livro_diario->valor 	              = $lancamento->valor_a_pagar;
                $livro_diario->historico 	          = "Compra de Matéria-Prima a Prazo, Ordem de Compra num: " . $lancamento->id_ordem_compra;
                LivroDiarioService::salvar($livro_diario, "id_livro_diario", "livro_diario");
            }
            
            //Dar entrada no estoque
            OrdemCompraService::finalizarOrdemCompra($lancamento->id_ordem_compra);
            $this->redirect(URL_BASE."lancamentopagar");
        }
        
        
    }
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."ordemcompra");
    }
}

