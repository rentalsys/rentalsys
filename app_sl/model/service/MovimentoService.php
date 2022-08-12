<?php
namespace app\models\service;

use app\models\dao\MovimentoDao;
use app\models\entidade\Movimento;

class MovimentoService{
    public static function filtro($filtro){
        $dao = new MovimentoDao();
        return $dao->filtro($filtro);
    }
    
    public static function lista($limite=null){
        $dao = new MovimentoDao();
        return $dao->lista($limite);
    }
    
    public static function saldoEstoque($id_produto){
        $dao = new MovimentoDao();
        return $dao->saldoEstoque($id_produto);
    }
    
    
    public static function inserir(Movimento $m, $tipo=1, $movimento_localizacao = true ){
        //tipo: 1 - atualiza estoque / 2 - reserva estoque / - exclui estoque
        //localizar o estoque anterior;
        $saldo_anterior = self::saldoEstoque($m->getId_produto());
        $qtde = ($m->getEntrada_saida()=="E") ? $m->getQtde_movimento() : -$m->getQtde_movimento();
        $saldo =  $saldo_anterior + ($qtde) ;
        
        //Se for transferência
        $saldo_atual = ($m->getId_tipo_movimento()==11 || $m->getId_tipo_movimento()==12) ? $saldo_anterior : $saldo;
        $m->setSaldoestoque($saldo_atual);       
        
        $id = Service::inserir($m->toArray(), "movimento");
        if($tipo==1){
            ProdutoService::atualizarEstoque($m->getId_produto(), $qtde);
        }else if($tipo==2){
            ProdutoService::reservarEstoque($m->getId_produto(), $qtde);
        }else if ($tipo==3){
            ProdutoService::excluirReservaDeEstoque($m->getId_produto(), - $qtde);
        }
        
        if($movimento_localizacao){
            ProdutoLocalizacaoService::atualizarEstoque($m->getId_produto(),$m->getId_localizacao(), $qtde);
        }
        return $id;
    }
    
    
    
}

