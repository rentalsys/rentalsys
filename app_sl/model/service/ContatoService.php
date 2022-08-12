<?php
namespace app\models\service;

use app\models\validacao\ContatoValidacao;

class ContatoService{
    public static function salvar($contato, $campo, $tabela){
        $validacao  = ContatoValidacao::salvar($contato);     
        $id         = Service::salvar($contato, $campo, $validacao->listaErros(), $tabela);        
        $contato    = Service::get("contato", "id_contato", $id);
        
        if($contato->eh_cliente=="S"){
            if(!$contato->id_conta_cliente){
                $id = ContaService::InserirNoPlanoDeconta( $contato->nome,  "cliente_receber");
                Service::editar(["id_conta_cliente"=>$id,"id_contato"=>$contato->id_contato], "id_contato", "contato");
            }
        }
        
        if($contato->eh_fornecedor=="S"){
            if(!$contato->id_conta_fornecedor){
                $id2 = ContaService::InserirNoPlanoDeconta( $contato->nome,  "fornecedor");
                Service::editar(["id_conta_fornecedor"=>$id2,"id_contato"=>$contato->id_contato], "id_contato", "contato");
            }
        }        
        
        
    }
}

