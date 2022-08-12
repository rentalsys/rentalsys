<?php
include_once '../../db.php';
$datai = explode('/',$_POST['datai']);
$datai = $datai[2].'-'.$datai[1].'-'.$datai[0];
$hstarti = $datai.' '.$_POST['hstarti'];
if($_POST['hendi'] !== ''){    
    $data2i = new \DateTime($datai.' '.$_POST['hendi'], new \DateTimeZone('America/Sao_Paulo'));    
    $hendi = $data2i->format("Y-m-d H:i:s");
}else{
    $data2i = new \DateTime($hstarti, new \DateTimeZone('America/Sao_Paulo'));
    $data2i->add(new DateInterval('PT00M'));
    $hendi = $data2i->format("Y-m-d H:i:00");
}
$idie = $_POST['id_responsavel'];
//Localiza todos os eventos com horario acima
$query_eventi = "select * from posvenda_treinamento WHERE (data_inicio > ? AND data_fim < ? AND id_responsavel = '$idie')";
$insert_eventi = $conex->prepare($query_eventi);
$insert_eventi->bindValue(1,$hstarti);
$insert_eventi->bindValue(2,$datai.' 23:59:59');
$insert_eventi->execute();
$t=$insert_eventi->fetchAll(\PDO::FETCH_ASSOC);
$qtdEventosi = 0;
foreach($t as $ts){    
    if(strtotime($hendi) > strtotime($ts['data_inicio'])){
        $qtdEventosi ++;
    }
}
//alert($qtdEventos);
if($qtdEventosi > 0){
    echo json_encode(false);
}else{
    echo json_encode(true);
}


