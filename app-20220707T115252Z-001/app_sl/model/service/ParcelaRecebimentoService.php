<?php
namespace app\models\service;

use app\core\Flash;
use app\models\validacao\ParcelaRecebimentoValidacao;

class ParcelaRecebimentoService{
    public static function salvar($recebimento, $campo, $tabela){
        $validacao = ParcelaRecebimentoValidacao::salvar($recebimento);     
        return Service::salvar($recebimento, $campo, $validacao->listaErros(), $tabela);
    }   
   
   
    public static function baixar($recebimento, $parcela){
        $p = Service::get("fin_parcela_receber","id_parcela_receber",$recebimento->id_parcela_receber);
        $total_a_receber = $p->saldo_devedor + $parcela->valor_juro + $parcela->valor_multa - $parcela->valor_desconto;
        
        if($parcela->tipo_baixa=="T"){
            if($recebimento->valor_recebido != $total_a_receber){
                Flash::setErro(["Valor recebido precisa ser igual ao valor a receber "]);
                return false;
            }
        }else{
            if($recebimento->valor_recebido > $total_a_receber){
                Flash::setErro(["Valor pago precisa ser menor ou igual ao valor a receber "]);
                return false;
            }
        }
        //atualizar os valores da parcela
        $p->valor_juro      += $parcela->valor_juro;
        $p->valor_multa     += $parcela->valor_multa;
        $p->valor_desconto  += $parcela->valor_desconto;
        $p->valor_total_receber = $p->valor_parcela + $p->valor_juro + $p->valor_multa - $p->valor_desconto;
        $p->valor_recebido      += $recebimento->valor_recebido;
        $p->saldo_devedor   =$p->valor_total_receber - $p->valor_recebido;
        $p->quitado = ($p->saldo_devedor<=0) ? "S" : "N";
        
        //Atualização no lançamento
        $lancamento = Service::get("fin_lancamento_receber","id_lancamento_receber",$p->id_lancamento_receber );
        $lancamento->valor_recebido += $recebimento->valor_recebido;
        $lancamento->acrescimo  += $parcela->valor_juro + $parcela->valor_multa - $parcela->valor_desconto;
        $lancamento->valor_a_receber  = $lancamento->valor_total + $lancamento->acrescimo
                                + $lancamento->juros + $lancamento->multa - $lancamento->desconto;
        $lancamento->saldo_restante = $lancamento->valor_a_receber - $lancamento->valor_recebido;
        $lancamento->pago = ($lancamento->saldo_restante<=0) ? "S" : "N";
        
        $pago = Service::inserir(objToArray($recebimento), "fin_parcela_recebimento");
        if($pago){
            Service::editar(objToArray($p), "id_parcela_receber", "fin_parcela_receber");
            Service::editar(objToArray($lancamento), "id_lancamento_receber", "fin_lancamento_receber");
            Flash::setMsg("Registro Inserido com sucesso");
            return true;
        }else{
            Flash::setErro(["Não foi possível salvar os dados"]);
            return false;
        }
        
    }
}

