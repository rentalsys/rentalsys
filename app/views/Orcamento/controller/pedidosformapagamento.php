<?php
include_once '../../db.php';
$formaPagamento = filter_input(INPUT_POST,'formadepagamento',FILTER_DEFAULT);
$query_event = "
                SELECT *
                FROM  venda_forma_pagamento 
where id_forma_pagamento = ?";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$formaPagamento);
$select_event->execute();
$f=$select_event->fetch(\PDO::FETCH_ASSOC);
echo json_encode($f);