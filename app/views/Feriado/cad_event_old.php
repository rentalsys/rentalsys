<?php include_once '../db.php';?>
<?php   

session_start();

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_event = "INSERT INTO posvenda_fechamento_chamado (title, color, start, end) VALUE (:title, :color, :start, :end)";
$insert_event = $conex->prepare($query_event);
$insert_event->bindParam(':title', $dados['title']);
$insert_event->bindParam(':title', $dados['color']);
$insert_event->bindParam(':title', $dados['start']);
$insert_event->bindParam(':title', $dados['end']);



$cad = true;

if($insert_event->execute()){
    $retorna = ['sit' => true, 'msg' => 'Evento Cadastrado'];
} else {
    $retorna = ['sit' => true, 'msg' => 'Evento Não Cadastrado'];
}

header('Content-Type: application/json');
echo json_encode($retorna);
?>