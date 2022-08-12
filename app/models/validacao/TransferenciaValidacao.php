<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\ProdutoLocalizacaoService;

class TransferenciaValidacao{
    public static function salvar($transferencia){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $transferencia->id_produto);
        $validacao->setData("qtde_transferencia", $transferencia->qtde_transferencia);
        $validacao->setData("id_origem", $transferencia->id_origem);
        $validacao->setData("id_destino", $transferencia->id_destino);
        $validacao->setData("data_transferencia", $transferencia->data_transferencia);
        

        
        //fazendo a validação 
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("qtde_transferencia")->isVazio();
        $validacao->getData("id_origem")->isVazio();
        $validacao->getData("id_destino")->isVazio();
        $validacao->getData("data_transferencia")->isVazio();
        
        if($transferencia->id_origem == $transferencia->id_destino){
            $validacao->getData("id_produto")->isUnico(1,"Origem e destino, nãp podem ser iguais");
        }
        
        $produto = ProdutoLocalizacaoService::getProdutoLocalizacao($transferencia->id_produto, $transferencia->id_origem);
        if($produto->estoque < $transferencia->qtde_transferencia){
            
            $validacao->getData("id_produto")->isUnico(1,"A Origem não possui estoque suficiente para essa transação");
        }
        
        return $validacao;
        
    }
}

