<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\ItemCotacaoService;

class ItemcotacaoController extends Controller{
    private $tabela = "item_cotacao";
    private $campo  = "id_item_cotacao";
    public function aprovar($id_item_cotacao, $id_cotacao){
        ItemCotacaoService::aprovar($id_item_cotacao, $id_cotacao);
        $this->redirect(URL_BASE."cotacao/comparar/".$id_cotacao);
    }
}

