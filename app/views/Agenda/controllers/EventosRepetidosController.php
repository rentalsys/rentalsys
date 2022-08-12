<?php
include_once '../../db.php';
$data = explode('/',$_POST['data']);
$data = $data[2].'-'.$data[1].'-'.$data[0];
$hstart = $data.' '.$_POST['hstart'].':00';
if($_POST['hend'] !== ''){    
    $data2 = new \DateTime($data.' '.$_POST['hend'], new \DateTimeZone('America/Sao_Paulo'));    
    $hend = $data2->format("Y-m-d H:i:s");
}else{
    $data2 = new \DateTime($hstart, new \DateTimeZone('America/Sao_Paulo'));
    $data2->add(new DateInterval('PT30M'));
    $hend = $data2->format("Y-m-d H:i:00");
}

//Localiza todos os eventos com horario acima
$query_event = "SELECT * from posvenda_treinamento WHERE (data_fim >= '$hstart' AND id_formato = 1) || (data_inicio >= '$hstart' AND id_formato = 1)";
$insert_event = $conex->prepare($query_event);
$insert_event->bindValue(1,$hstart);
$insert_event->bindValue(2,$data.' 23:59:59');
$insert_event->execute();
$f=$insert_event->fetchAll(\PDO::FETCH_ASSOC);
$qtdEventos = 0;
foreach($f as $fs){    
    if(strtotime($hend) > strtotime($fs['data_inicio'])){
        $qtdEventos ++;
    }
}

if($qtdEventos > 0){
    echo json_encode(false);
}else{
    echo json_encode(true);
}

