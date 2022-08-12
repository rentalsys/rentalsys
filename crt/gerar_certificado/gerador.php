
<?php
    $data = date('D');
    $mes = date('M');
    $dia = date('d');
    $ano = date('Y');
 
    $semana = array(
        'Sun' => 'Domingo',
        'Mon' => 'Segunda-Feira',
        'Tue' => 'Terca-Feira',
        'Wed' => 'Quarta-Feira',
        'Thu' => 'Quinta-Feira',
        'Fri' => 'Sexta-Feira',
                'Sat' => 'Sábado'
    );
 
    $mes_extenso = array(
        'Jan' => 'Janeiro',
        'Feb' => 'Fevereiro',
        'Mar' => 'Marco',
        'Apr' => 'Abril',
        'May' => 'Maio',
        'Jun' => 'Junho',
        'Jul' => 'Julho',
        'Aug' => 'Agosto',
        'Nov' => 'Novembro',
        'Sep' => 'Setembro',
        'Oct' => 'Outubro',
        'Dec' => 'Dezembro'
    );
 $data_ext= $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"] . " de {$ano}";
?>
<?php
require('fpdf/alphapdf.php');
require('PHPMailer/class.phpmailer.php');


// --------- Variáveis do Formulário ----- //
$email    = $_GET['email'];
$nome     = utf8_decode(strtoupper($_GET['nome']));
$cpf      = $_GET['cpf'];

// --------- Variáveis que podem vir de um banco de dados por exemplo ----- //
$empresa    = "Rentalmed";
$curso      = $_GET['produto'];
$categoria  = $_GET['categoria'];
$marca      = $_GET['marca'];
$data       = $_GET['data'];
$professor  = $_GET['professor'];
$imagem     = $_GET['imagem'];
$texto      = $_GET['texto'];
$carga_h    = date('h:i', strtotime($_GET['tempo_treinamento']));;


$texto1 = utf8_decode($empresa);
$texto2 = utf8_decode($texto);



$texto3 =  $data_ext;


$pdf = new AlphaPDF();

// Orientação Landing Page ///
$pdf->AddPage('L');

$pdf->SetLineWidth(1.5);


// desenha a imagem do certificado
$pdf->Image($imagem,0,0,295);

// opacidade total
$pdf->SetAlpha(1);

// Mostrar texto no topo
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(109,46); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(200, 10, '', '', 'L', 0); // Tamanho width e height e posição

$tam_palavra = strlen($nome);
$direita = 15;

// Mostrar o nome
$pdf->SetFont('Arial', '', 30); // Tipo de fonte e tamanho
$pdf->SetXY($direita,86); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(265, 10, $nome, '', 'C', 0); // Tamanho width e height e posição

// Mostrar o corpo
$pdf->SetFont('Arial', '', 15); // Tipo de fonte e tamanho
$pdf->SetXY(35,105); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(235, 10, $texto2, '', 'C', 0); // Tamanho width e height e posição

// Mostrar a data no final
$pdf->SetFont('Arial', '', 12); // Tipo de fonte e tamanho
$pdf->SetXY(118,145); //Parte chata onde tem que ficar ajustando a posição X e Y
$pdf->MultiCell(175, 10, $texto3, '', 'L', 0); // Tamanho width e height e posição

$pdfdoc = $pdf->Output('', 'S');



// ******** Agora vai enviar o e-mail pro usuário contendo o anexo
// ******** e também mostrar na tela para caso o e-mail não chegar

//$subject = 'Seu Certificado do Workshop';
//$messageBody = "Olá $nome<br><br>É com grande prazer que entregamos o seu certificado.<br>Ele está em anexo nesse e-mail.<br><br>Atenciosamente,<br>Lincoln Borges<br><a href='http://www.lnborges.com.br'>http://www.lnborges.com.br</a>";


//$mail = new PHPMailer();
//$mail->SetFrom("certificado@lnborges.com.br", "Certificado");
//$mail->Subject    = $subject;
//$mail->MsgHTML(utf8_decode($messageBody));
//$mail->AddAddress($email); 
//$mail->addStringAttachment($pdfdoc, 'certificado.pdf');
//$mail->Send();

$certificado="arquivos/$cpf.pdf"; //atribui a variável $certificado com o caminho e o nome do arquivo que será salvo (vai usar o CPF digitado pelo usuário como nome de arquivo)
$pdf->Output($certificado,'F'); //Salva o certificado no servidor (verifique se a pasta "arquivos" tem a permissão necessária)
// Utilizando esse script provavelmente o certificado ficara salvo em www.seusite.com.br/gerar_certificado/arquivos/999.999.999-99.pdf (o 999 representa o CPF digitado pelo usuário)

$pdf->Output(); // Mostrar o certificado na tela do navegador

?>
