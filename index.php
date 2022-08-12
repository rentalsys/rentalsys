<?php
use app\core\Excecao;

session_start();
error_reporting(E_ALL & ~E_NOTICE);
require_once 'app/core/Core.php';
require_once 'app/helper/helper.php';
require_once 'app/helper/datahora.php';
require_once 'app/helper/numero.php';
require_once 'app/helper/rede.php';
require_once 'app/helper/string.php';
require_once 'config/config.php';
require_once 'vendor/autoload.php';
require __DIR__.'/vendor/autoload.php';

try{
    $core = new Core;
    $core->run();
}catch (Error | Exception $e){
    $erro = new Excecao($e);
    $erro->mostrar();
}



