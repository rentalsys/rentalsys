<?php
namespace app\models\service;

use app\models\dao\ContaDao;
use app\models\validacao\ContaValidacao;

class ContaService{
    public static function lista(){
        $dao = new ContaDao();
        return $dao->lista();
    }
    
    public static function salvar($produto_localizacao, $campo, $tabela){
        $validacao = ContaValidacao::salvar($produto_localizacao);
        return Service::salvar($produto_localizacao, $campo, $validacao->listaErros(), $tabela);
    }  
    public static function getPorAlias( $alias){
        $dao = new ContaDao();
        return $dao->getPorAlias($alias);
    }
    
    public static function proximoCodigo($codigo_pai){
        $dao = new ContaDao();
        $ultimoFilho = $dao->ultimoFilho($codigo_pai);
        
        
        if($ultimoFilho){
            $array      = explode(".", $ultimoFilho->codigo);
            $ultimo     =  end($array);
            $proximo    = $ultimo + 1;
            $zeros      = (count($array)>=4) ? count($array)-1 : 0; 
        }else{
            $array      = explode(".", $codigo_pai);
            $proximo    = 1;
            $zeros      = (count($array)>=3) ? count($array) : 0; 
            
        }
        
        $cod = array(
            "proximo"   => $codigo_pai ."." . zeroEsquerda($proximo, $zeros) ,
            "id_pai"    => Service::get("contabil_conta", "codigo", $codigo_pai)->id_conta
        );
        
        return $cod;
    }
    
    public static function proximoPai(){
        $dao = new ContaDao();
        $ultimo = $dao->proximoPai();
        if(!$ultimo){
           $proximo = 1; 
        }else{
            $proximo = $ultimo->codigo + 1;
        }
        return $proximo;
        
    }
    
    public static function listaContasDistintas(){
        $dao = new ContaDao();
        return $dao->listaContasDistintas();
    }
    public static function listaDebito(){
        $dao = new ContaDao();
        return $dao->listaDebito();
    }
    public static function listaCredito(){
        $dao = new ContaDao();
        return $dao->listaCredito();
    }
    
    public static function listaContasDespesa(){
        $dao = new ContaDao();
        return $dao->listaContasDespesa();
    }
    
    public static function InserirNoPlanoDeconta( $descricao,  $alias){     
        
            $contaPai = ContaService::getPorAlias($alias);
            $conta = new \stdClass();
            $conta->id_conta        =  null;
            $conta->conta 	        = $descricao;
            $conta->tipo 		    = "A" ;
            $conta->natureza        = "D";
            $conta->id_pai          = $contaPai->id_conta;
            $codigo                 = ContaService::proximoCodigo($contaPai->codigo);
            $conta->codigo          = $codigo["proximo"];
            return Service::inserir(objToArray($conta), "contabil_conta");          
        
    }
    
}

