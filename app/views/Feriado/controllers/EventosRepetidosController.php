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
    $hend = $data2->format("Y-m-d H:i:s");
}

//Localiza todos os eventos com horario acima
$query_event = "select * from posvenda_treinamento where data_inicio > ? and data_fim < ?";
$insert_event = $conex->prepare($query_event);
$insert_event->bindValue(1,$hstart);
$insert_event->bindValue(2,$data.' 23:59:00');
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

