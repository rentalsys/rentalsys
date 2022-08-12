<?php
namespace app\models\service;

use app\models\validacao\ProdutoComposicaoValidacao;
use app\models\dao\ProdutoComposicaoDao;

class ProdutoComposicaoService{
    public static function salvar($produto_composicao, $campo, $tabela){
        $validacao = ProdutoComposicaoValidacao::salvar($produto_composicao);
        return Service::salvar($produto_composicao, $campo, $validacao->listaErros(), $tabela);
    }
    public static function listaPorProduto($id_produto){
        $dao = new ProdutoComposicaoDao();
        return $dao->listaPorProduto($id_produto);
    }
    
    public static function getProdutoEtapaInsumo($id_produto, $id_etapa, $id_insumo){
        $dao = new ProdutoComposicaoDao();
        return $dao->getProdutoEtapaInsumo($id_produto, $id_etapa, $id_insumo);
    }
    
    public static function listaEngenharia($id_produto){
        $dao = new ProdutoComposicaoDao();
        $etapas = EtapaProducaoService::listaPorProduto($id_produto);
       
       $lista = array();
        foreach ($etapas as $etapa){
            $insumos = $dao->listaPorEtapa($etapa->id_etapa_producao);
            $lista[] = (object) array(
                "etapa"     =>$etapa,
                "insumos"   => $insumos
            );
        }
        
        return $lista;
    }
}

