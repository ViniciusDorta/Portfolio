<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Email
{
    private $mailer;

    public function __construct($host, $username, $senha, $name)
    {
        // Chama Composer's autoload.
        require '../vendor/autoload.php';

        // instanciamos a classe.
        $this->mailer = new PHPMailer(true);

        // Configurações Servidor.
        //$this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;                          //Enable verbose debug output
        $this->mailer->isSMTP();                                                //Send using SMTP
        $this->mailer->Host       = $host; //'smtp.hostinger.com';                       // Host -> Servidor de saída (SMTP)
        $this->mailer->SMTPAuth   = true;                                       //Enable SMTP authentication
        $this->mailer->Username   = $username; //'vinicius_o.dorta@viniciusdorta.com.br';    // Login do Servidor
        $this->mailer->Password   = $senha; //'NDorta300499$';                            // Senha do Servidor
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                // SSL
        $this->mailer->Port       = 465;                                        // Porta (SMTP) 465

        // Dados envio e recebimento de e-mail.
        $this->mailer->setFrom($username, $name);                       // e-mail e nome de quem envia
        $this->mailer->CharSet = 'UTF-8';
        // Conteudo
        $this->mailer->isHTML(true);                                            // Permitir codigo HTML no e-mail
    }

    public function addAdress($email, $name)
    {
        $this->mailer->addAddress($email, $name);
    }

    public function formatarEmail($info)
    {
        $this->mailer->Subject = $info['header'];
        $this->mailer->Body    = $info['content'];
    }

    public function enviarEmail()
    {
        if ($this->mailer->send()) {
            return true;
        } else {
            return false;
        }
    }
}
