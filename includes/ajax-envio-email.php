<?php
include('../config/config.php');
require __DIR__ . '/../vendor/autoload.php';
Dotenv\Dotenv::createUnsafeImmutable(__DIR__ . '/../')->load();

$data = array();

$assunto = 'Nova mensagem recebida do Site!';
$corpo = '';
foreach ($_POST as $key => $value) {
    $corpo .= ucfirst($key) . ": " . $value;
    $corpo .= "<hr>";
}
$info = array('header' => $assunto, 'content' => $corpo);
$mail = new Email(getenv('HOST_SEVER'), getenv('USER_SERVER'), getenv('PASS_SERVER'), getenv('NAME_SERVER'));
$mail->addAdress(getenv('USER_SERVER'), getenv('NAME_SERVER'));
$mail->formatarEmail($info);
if ($mail->enviarEmail()) {
    $data['sucesso'] = true;
} else {
    $data['erro'] = true;
}

die(json_encode($data));
