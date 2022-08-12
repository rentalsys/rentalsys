<?php
namespace app\models\service;

use app\models\dao\OrdemProducaoDao;
use app\models\entidade\Movimento;
use app\models\validacao\CategoriaValidacao;

class OrdemProducaoService{
    public static function salvar($ordem_producao, $campo, $tabela){
        $validacao = CategoriaValidacao::salvar($ordem_producao);     
        return Service::salvar($ordem_producao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function getOrdemProducao($id_ordem){
        $dao = new OrdemProducaoDao();
        return $dao->getOrdemProducao($id_ordem);
    }
    
    public static function getOrdemProducaoAberta(){
        $dao = new OrdemProducaoDao();
        return $dao->getOrdemProducaoAberta();
    }
    public static function getIdOrdemProducaoPorPedido($id_pedido){
        $dao = new OrdemProducaoDao();
        return $dao->getIdOrdemProducaoPorPedido($id_pedido);
    }
    public static function lista(){
        $dao = new OrdemProducaoDao();
        return $dao->lista();
    }
    
    public static function finalizar($id_ordem_producao){
        $itens = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
       
        foreach($itens as $item){           
            if($item->estoque_atual<=0){
                $qtde_produzir = $item->qtde_pedido;
            }else{
                $saldo = $item->estoque_atual - $item->qtde_pedido;
                if($saldo >=0){
                    $qtde_produzir = 0;
                    $qtde_a_reservar = $item->qtde_pedido;
                }else{
                    $qtde_produzir = abs($saldo);
                    $qtde_a_reservar = $item->estoque_atual;
                }                
                $reserva = ReservaService::existeReserva($item->id_produto, $id_ordem_producao);
                if(!$reserva){
                    Service::inserir(["id_ordem_producao" => $id_ordem_producao, "id_produto" => $item->id_produto, "qtde_reservada" =>$qtde_a_reservar ], "reserva");
                    ProdutoService::reservarEstoque($item->id_produto, $qtde_a_reservar);
                    
                }
            }            
            Service::editar(["qtde_a_produzir"=>$qtde_produzir, "id_item_ordem_producao"=>$item->id_item_ordem_producao], "id_item_ordem_producao", "item_ordem_producao");
        }        
        Service::editar(["finalizado" =>"S", "id_status_ordem_producao"=>2,"id_ordem_producao"=>$id_ordem_producao], "id_ordem_producao", "ordem_producao");
        
    }
    
    
    public static function checar($id_ordem_producao){
        $produtos = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        foreach($produtos as $produto){
            $itens = array();
            $insumos = ProdutoComposicaoService::listaPorProduto($produto->id_produto);
            $erro = 0;
            foreach($insumos as $insumo){
                if($insumo->estoque_atual - ($produto->qtde_pedido* $insumo->qtde_necessaria) >= 0 ){
                    $situacao = "OK";
                    $qtde_produzir = 0;
                }else{
                    $situacao = "Em Falta";
                    $qtde_produzir = ($produto->qtde_pedido* $insumo->qtde_necessaria) - $insumo->estoque_atual ;
                    $erro++;
                }
                
                $insumo->id_item_ordem_producao = $produto->id_item_ordem_producao;
                $insumo->qtde_produzir          = $qtde_produzir;
                $insumo->situacao               = $situacao;
                $insumo->localizacao            = ProdutoLocalizacaoService::listaPorProdutoLimpa($insumo->id_insumo);
                $itens[] = $insumo;
                
            }
            $resultado[] = (object) array(
                "produto"   => $produto,
                "erro"      => $erro,
                "insumos"   => $itens
            );
        }
        
        return $resultado;
    }
    
    public static function gerar_solicitacoes($id_ordem_producao){
        $produtos = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);        
        foreach($produtos as $produto){
            $insumos = ProdutoComposicaoService::listaPorProduto($produto->id_produto);
            $solicitacoes = array();
            foreach($insumos as $insumo){
                
                $qtde = $insumo->estoque_atual - ($produto->qtde_pedido* $insumo->qtde_necessaria);
                if( $qtde < 0 ){             
                    
                    $tem = SolicitacaoService::getSolicitacaoPorOrdemProducao($insumo->id_insumo, $id_ordem_producao);                   
                    if(!$tem){
                        $solicitacao = new \stdClass();
                        $solicitacao->id_produto 		    = $insumo->id_insumo;
                        $solicitacao->id_status_solicitacao = 1;
                        $solicitacao->id_ordem_producao 	= $id_ordem_producao;
                        $solicitacao->qtde 		            = abs($qtde);
                        $solicitacao->data_solicitacao 		= hoje();
                        $solicitacao->hora_solicitacao 		= agora(); 
                        $id_solicitacao = Service::inserir(objToArray($solicitacao), "solicitacao");
                        $solicitacao->id_solicitacao = $id_solicitacao;
                        $solicitacao->produto        =  $insumo->produto;
                        $solicitacoes[] = $solicitacao;                        
                    }                   
                }                
                
            }
            
            if($solicitacoes){
                Service::editar([ "id_status_ordem_producao"=>3,"id_ordem_producao"=>$id_ordem_producao], "id_ordem_producao", "ordem_producao");
            }            
            
        }
        
        return $solicitacoes;
    }
    
    public static function liberar($id_ordem_producao, $id_localizacao, $id_insumo){
        for($i=0; $i<count($id_localizacao); $i++){
            $localizacao[$id_insumo[$i]] = $id_localizacao[$i];        
        }
        
        $produtos = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        foreach($produtos as $produto){
            $insumos = ProdutoComposicaoService::listaPorProduto($produto->id_produto);  
           
            foreach($insumos as $insumo){ 
                $qtde = $produto->qtde_pedido* $insumo->qtde_necessaria;
                $reserva = ReservaService::existeReserva($insumo->id_insumo, $id_ordem_producao);              
              
                if(!$reserva){
                    Service::inserir(["id_ordem_producao" => $id_ordem_producao,  "id_produto" => $insumo->id_insumo, "qtde_reservada" =>$qtde,"id_localizacao" =>$localizacao[$insumo->id_insumo] ], "reserva");
                    ProdutoService::reservarEstoque($insumo->id_insumo, $qtde);
                    
                }                
            }       
        }
        Service::editar([ "id_status_ordem_producao"=>5,"id_ordem_producao"=>$id_ordem_producao], "id_ordem_producao", "ordem_producao");
        
    }
    
    public static function acompanhar($id_ordem_producao){
        $produtos = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        $resultado = array();
        foreach($produtos as $produto){
            $engenharia = ProdutoComposicaoService::listaEngenharia($produto->id_produto);
            $resultado[] = (object) array (
                "produto" => $produto,
                "engenharia" => $engenharia
            );
        }
        
        return $resultado;
    }
    
    public static function finalizarOrdemProducao($id_ordem_producao){
        $produtos = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        
        foreach($produtos as $produto){
            $insumos = ProdutoComposicaoService::listaPorProduto($produto->id_produto);   
            
            foreach($insumos as $insumo){
                //Excluir os insumos da reserva
                $reserva = ReservaService::existeReserva($insumo->id_insumo, $id_ordem_producao);                  
                if($reserva){
                    Service::excluir("reserva","id_reserva", $reserva->id_reserva);
                   // ProdutoService::excluirReservaDeEstoque($insumo->id_insumo, $reserva->qtde_reservada);
                    $mov = new Movimento();
                    $mov->setId_localizacao($reserva->id_localizacao);
                    $mov->setId_tipo_movimento(8);
                    $mov->setId_ordem_producao($id_ordem_producao);
                    $mov->setEntrada_saida("S");
                    $mov->setId_produto($insumo->id_insumo);
                    $mov->setData_movimento(hoje());
                    $mov->setQtde_movimento($reserva->qtde_reservada);
                    $mov->setValor_movimento($insumo->preco);
                    $mov->setSubtotal_movimento($reserva->qtde_reservada * $insumo->preco);
                    $mov->setDescricao("Saída Para ordem de produção: : " . $id_ordem_producao);
                    MovimentoService::inserir($mov,3); 
                 }
            }
            
            //Operações com o produto produzido
            $reserva = ReservaService::existeReserva($produto->id_produto, $id_ordem_producao);
            if($reserva){
                ProdutoService::reservarEstoque($produto->id_produto, -$reserva->qtde_reservada);
                Service::excluir("reserva","id_reserva", $reserva->id_reserva);
            }
            
            //Dar entrada no galpão de produção
            $mov = new Movimento();
            $mov->setId_localizacao(100);
            $mov->setId_tipo_movimento(4);
            $mov->setId_ordem_producao($id_ordem_producao);
            $mov->setEntrada_saida("E");
            $mov->setId_produto($produto->id_produto);
            $mov->setData_movimento(hoje());
            $mov->setQtde_movimento($produto->qtde_a_produzir);
            $mov->setValor_movimento($produto->preco);
            $mov->setSubtotal_movimento($produto->qtde_a_produzir * $produto->preco);
            $mov->setDescricao("Entrada por ordem de produção: : " . $id_ordem_producao);
            MovimentoService::inserir($mov,1); 
            
        }
        
        Service::editar([ "id_status_ordem_producao"=>6,"id_ordem_producao"=>$id_ordem_producao], "id_ordem_producao", "ordem_producao");
        
    }
}

