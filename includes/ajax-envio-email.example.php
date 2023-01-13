<?php
include('../config/config.php');

$data = array();

$assunto = 'Nova mensagem recebida do Site!';
$corpo = '';
foreach ($_POST as $key => $value) {
    $corpo .= ucfirst($key) . ": " . $value;
    $corpo .= "<hr>";
}
$info = array('header' => $assunto, 'content' => $corpo);
$mail = new Email('hostHospedagem', 'e-mail', 'password', 'name');
$mail->addAdress('e-mail', 'name');
$mail->formatarEmail($info);
if ($mail->enviarEmail()) {
    $data['sucesso'] = true;
} else {
    $data['erro'] = true;
}

die(json_encode($data));
