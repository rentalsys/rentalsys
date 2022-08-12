<?php
namespace app\models\service;

use app\core\Flash;
use app\models\validacao\ParcelaPagamentoValidacao;

class ParcelaPagamentoService{
    public static function salvar($pagamento, $campo, $tabela){
        $validacao = ParcelaPagamentoValidacao::salvar($pagamento);     
        return Service::salvar($pagamento, $campo, $validacao->listaErros(), $tabela);
    }   
   
    
    public static function baixar($pagamento, $parcela){
        $p = Service::get("fin_parcela_pagar","id_parcela_pagar",$pagamento->id_parcela_pagar);
        $total_a_pagar = $p->saldo_devedor + $parcela->valor_juro + $parcela->valor_multa - $parcela->valor_desconto;
        
        if($parcela->tipo_baixa=="T"){
            if($pagamento->valor_pago != $total_a_pagar){
                Flash::setErro(["Valor pago precisa ser igual ao valor a pagar "]);
                return false;
            }
        }else{
            if($pagamento->valor_pago > $total_a_pagar){
                Flash::setErro(["Valor pago precisa ser menor ou igual ao valor a pagar "]);
                return false;
            }
        }
        //atualizar os valores da parcela
        $p->valor_juro      += $parcela->valor_juro;
        $p->valor_multa     += $parcela->valor_multa;
        $p->valor_desconto  += $parcela->valor_desconto;
        $p->valor_total_pagar = $p->valor_parcela + $p->valor_juro + $p->valor_multa - $p->valor_desconto;
        $p->valor_pago      += $pagamento->valor_pago;
        $p->saldo_devedor   =$p->valor_total_pagar - $p->valor_pago;
        $p->quitado = ($p->saldo_devedor<=0) ? "S" : "N";
        
        //Atualização no lançamento
        $lancamento = Service::get("fin_lancamento_pagar","id_lancamento_pagar",$p->id_lancamento_pagar );
        $lancamento->valor_pago += $pagamento->valor_pago;
        $lancamento->acrescimo  += $parcela->valor_juro + $parcela->valor_multa - $parcela->valor_desconto;
        $lancamento->valor_a_pagar  = $lancamento->valor_total + $lancamento->acrescimo
                                + $lancamento->juros + $lancamento->multa - $lancamento->desconto;
        $lancamento->saldo_restante = $lancamento->valor_a_pagar - $lancamento->valor_pago;
        $lancamento->pago = ($lancamento->saldo_restante<=0) ? "S" : "N";
        
        $pago = Service::inserir(objToArray($pagamento), "fin_parcela_pagamento");
        if($pago){
            Service::editar(objToArray($p), "id_parcela_pagar", "fin_parcela_pagar");
            Service::editar(objToArray($lancamento), "id_lancamento_pagar", "fin_lancamento_pagar");
            Flash::setMsg("Registro Inserido com sucesso");
            return true;
        }else{
            Flash::setErro(["Não foi possível salvar os dados"]);
            return false;
        }
        
    }
}

