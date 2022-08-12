<?php
namespace app\models\service;

use app\models\dao\PedidoDao;
use app\models\entidade\Movimento;


class PedidoService{
    public static function listaPendente(){
        $dao = new PedidoDao();
       return $dao->listaPendente();
    }
    
    public static function listaParaFaturar(){
        $dao = new PedidoDao();
        return $dao->listaParaFaturar();
    }
    
    public static function listaFaturado(){
        $dao = new PedidoDao();
        return $dao->listaFaturado();
    }
    public static function listaRecusado(){
        $dao = new PedidoDao();
        return $dao->listaRecusado();
    }
    
    public static function listaExcluido(){
        $dao = new PedidoDao();
        return $dao->listaExcluido();
    }
    public static function getPedido($id_pedido){
        $dao = new PedidoDao();
        return $dao->getPedido($id_pedido);
    }
    
    public static  function atenderPedido($id_pedido){
        //significa que não precisa produzir, por isso vai reservar o estoque
        $itens = ItemPedidoService::listaPorPedidoLocalizacao($id_pedido);        
        foreach ($itens as $item){
            $temReserva = ReservaService::existeReservaNoPedido($item->id_produto, $id_pedido);
            if(!$temReserva){
                Service::inserir(["id_pedido"=>$id_pedido,  "id_produto"=>$item->id_produto,
                    "qtde_reservada"=>$item->qtde, "id_localizacao"=>$item->id_localizacao], "reserva");
                ProdutoService::reservarEstoque($item->id_produto, $item->qtde);
            }
        }
    }
    
    public static function solicitarProducao($id_pedido){               
        $dao = new PedidoDao();
        $itens = ItemPedidoService::listaPorPedidoLocalizacao($id_pedido);
       
        $id_ordem_producao = null;
        foreach ($itens as $item){
            //Verifica se o estoque do item na localização está zerado
            if($item->estoque<=0){
                if(!$id_ordem_producao){
                    //Verifica se existe uma ordem produção para o pedido e retorna qual é;
                    $id_ordem_producao = OrdemProducaoService::getIdOrdemProducaoPorPedido($id_pedido);
                    if(!$id_ordem_producao){
                        //Insere uma ordem de produção
                        $id_ordem_producao = Service::inserir(["data_cadastro" =>hoje(), "id_status_ordem_producao" =>2, 
                            "id_pedido"=>$id_pedido,"finalizado"=>"S"], "ordem_producao");
                    }
                }                
                $item_ordem = ItemOrdemProducaoService::getItemPorProdutoPorOrdemProducao($item->id_produto, $id_ordem_producao);
                if(!$item_ordem){
                    //Insere o item na tabela item_ordem_producao
                    Service::inserir(["id_ordem_producao" =>$id_ordem_producao,  "id_produto"=>$item->id_produto,
                                       "qtde_a_produzir"=> $item->qtde, "qtde_pedido" => $item->qtde ], "item_ordem_producao");
                }
                
            }else{
                $saldo = $item->estoque - $item->qtde;
                if($saldo >= 0){
                    //significa que não precisa produzir, por isso vai reservar o estoque
                    $temReserva = ReservaService::existeReserva($item->id_produto, $id_ordem_producao);
                    if(!$temReserva){
                        Service::inserir(["id_ordem_producao" =>$id_ordem_producao, "id_pedido"=>$id_pedido, 
                                           "id_produto"=>$item->id_produto, "qtde_reservada"=>$item->qtde, 
                            "id_localizacao"=>$item->id_localizacao], "reserva");
                        ProdutoService::reservarEstoque($item->id_produto, $item->qtde);
                    }
                }else{
                    if(!$id_ordem_producao){
                        //Verifica se existe uma ordem produção para o pedido e retorna qual é;
                        $id_ordem_producao = OrdemProducaoService::getIdOrdemProducaoPorPedido($id_pedido);
                        if(!$id_ordem_producao){
                            //Insere uma ordem de produção
                            $id_ordem_producao = Service::inserir(["data_cadastro" =>hoje(),  "id_status_ordem_producao" =>2,
                                "id_pedido"=>$id_pedido,"finalizado"=>"S"], "ordem_producao");
                        }
                    }
                    
                    $item_ordem = ItemOrdemProducaoService::getItemPorProdutoPorOrdemProducao($item->id_produto, $id_ordem_producao);
                    if(!$item_ordem){
                        //Insere o item na tabela item_ordem_producao
                        Service::inserir(["id_ordem_producao" =>$id_ordem_producao,  "id_produto"=>$item->id_produto,
                            "qtde_a_produzir"=> abs($saldo), "qtde_pedido" => $item->qtde ], "item_ordem_producao");                        
                        
                        $temReserva = ReservaService::existeReserva($item->id_produto, $id_ordem_producao);
                        if(!$temReserva){
                            Service::inserir(["id_ordem_producao" =>$id_ordem_producao, "id_pedido"=>$id_pedido,
                                "id_produto"=>$item->id_produto, "qtde_reservada"=> $item->estoque, 
                                "id_localizacao"=>$item->id_localizacao], "reserva");
                            ProdutoService::reservarEstoque($item->id_produto, $item->estoque);
                        }
                    }
                }
            }
        }
        
        Service::editar(["id_status" =>3, "id_pedido"=>$id_pedido], "id_pedido", "pedido");
        
    }
    
    public static function finalizarPedido($id_pedido){
        $produtos = ItemPedidoService::listaPorPedido($id_pedido);
        foreach($produtos as $produto){
            //Excluir os insumos da reserva
            $reserva = ReservaService::existeReservaNoPedido($produto->id_produto, $id_pedido);
            if($reserva){
                Service::excluir("reserva","id_reserva", $reserva->id_reserva);
                $mov = new Movimento();
                $mov->setId_localizacao($produto->id_localizacao);
                $mov->setId_tipo_movimento(7);
                $mov->setId_pedido($id_pedido);
                $mov->setEntrada_saida("S");
                $mov->setId_produto($produto->id_produto);
                $mov->setData_movimento(hoje());
                $mov->setQtde_movimento($produto->qtde);
                $mov->setValor_movimento($produto->valor);
                $mov->setSubtotal_movimento($produto->subtotal);
                $mov->setDescricao("Saída por Venda : " . $id_pedido);
                MovimentoService::inserir($mov,3);
            }
        }
        
        Service::editar([ "id_status"=>5,"data_finalizacao" =>hoje(), "baixado" => "S",
            "id_pedido"=>$id_pedido], "id_pedido", "pedido");
        
    }
}

