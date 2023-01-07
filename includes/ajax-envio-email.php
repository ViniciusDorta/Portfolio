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
$mail = new Email('smtp.hostinger.com', 'vinicius_o.dorta@viniciusdorta.com.br', 'NDorta300499$', 'Vinicius');
$mail->addAdress('vinicius_o.dorta@viniciusdorta.com.br', 'Vinicius');
$mail->formatarEmail($info);
if ($mail->enviarEmail()) {
    $data['sucesso'] = true;
} else {
    $data['erro'] = true;
}

die(json_encode($data));
