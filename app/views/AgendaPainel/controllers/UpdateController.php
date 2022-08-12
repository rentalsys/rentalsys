<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'idEvento',FILTER_DEFAULT);
$idResponsavel = filter_input(INPUT_POST,'selectRespEdit',FILTER_DEFAULT);
$idOcupacao = filter_input(INPUT_POST,'id_ocupacao',FILTER_DEFAULT);
$idUsuario = filter_input(INPUT_POST,'id_usuario',FILTER_DEFAULT);
$idProduto = filter_input(INPUT_POST,'selectProdutoEdit',FILTER_DEFAULT);
$idCliente = filter_input(INPUT_POST,'selectClienteEdit',FILTER_DEFAULT);
$idPedido = filter_input(INPUT_POST,'EditPedido',FILTER_DEFAULT);
$idUso = filter_input(INPUT_POST,'selectUsoEdit',FILTER_DEFAULT);
$idconcluido = filter_input(INPUT_POST,'concluido',FILTER_DEFAULT);
$idcertificado = filter_input(INPUT_POST,'certificado',FILTER_DEFAULT);
$idObs= filter_input(INPUT_POST,'selectObsEdit',FILTER_DEFAULT);
$idTipo= filter_input(INPUT_POST,'id_tipo',FILTER_DEFAULT);


$b = $conex->prepare("UPDATE posvenda_treinamento SET 
                        id_responsavel = ?, id_ocupacao = '$idOcupacao', id_usuario = '$idUsuario', id_produto = '$idProduto' , id_cliente = '$idCliente',
                        pedido = '$idPedido', id_uso = '$idUso', concluido = '$idconcluido', certificado = '$idcertificado', obs_treinamento = '$idObs', id_tipo = '$idTipo'
                        WHERE id_treinamento=?");
$b->bindValue(1,$idResponsavel);
$b->bindValue(2,$idEvento);
$execute = $b->execute();
echo ($execute)?json_encode(true):json_encode(false);     


//"UPDATE carros SET marca_carro='$marca', modelo_carro='$modelo' WHERE id=$id"