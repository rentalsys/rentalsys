<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'idEvento',FILTER_DEFAULT);
$idResponsavel = filter_input(INPUT_POST,'feriadoEdit',FILTER_DEFAULT);


$b = $conex->prepare("UPDATE posvenda_treinamento SET 
                        titulo_feriado = ?
                        WHERE id_treinamento=?");
$b->bindValue(1,$idResponsavel);
$b->bindValue(2,$idEvento);
$execute = $b->execute();
echo ($execute)?json_encode(true):json_encode(false);     


//"UPDATE carros SET marca_carro='$marca', modelo_carro='$modelo' WHERE id=$id"