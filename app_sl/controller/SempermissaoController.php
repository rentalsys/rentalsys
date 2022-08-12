<?php
namespace app\controllers;

use app\core\Controller;

class SempermissaoController extends Controller{
   
    public function index(){
       
        $dados["view"]      ="Permissao/SemPermissao";
        $this->load("template", $dados);
    }   
    
}

