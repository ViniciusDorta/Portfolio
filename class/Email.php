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
        $this->mailer->isSMTP();                                                //Send using SMTP
        $this->mailer->Host       = $host;                                      // Host -> Servidor de saída (SMTP)
        $this->mailer->SMTPAuth   = true;                                       // Enable SMTP authentication
        $this->mailer->Username   = $username;                                  // Login do Servidor
        $this->mailer->Password   = $senha;                                     // Senha do Servidor
        $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                // SSL
        $this->mailer->Port       = 465;                                        // Porta (SMTP) 465

        // Dados envio e recebimento de e-mail.
        $this->mailer->setFrom($username, $name);
        $this->mailer->CharSet = 'UTF-8';
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
