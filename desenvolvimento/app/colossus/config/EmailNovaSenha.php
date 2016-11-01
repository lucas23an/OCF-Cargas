<?php

header("Content-type: text/html; charset=utf-8");

$email = $resultado->emailUsuario;

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require '../lib/phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
require_once "../lib/phpmailer/class.phpmailer.php";

$mail->From = "$email";
$mail->CharSet = 'UTF-8';
$mail->FromName = "contato@rmsolutions.com.br";
$mail->AddAddress("$resultado->emailUsuario", "$resultado->nomeUsuario");
$mail->IsHTML(true);
$mail->IsSMTP();
$mail->Host = "ssl://smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "lucas.engbraga@gmail.com";
$mail->Password = "lucaspepi23";
// Configuração de Assuntos e Corpo do E-mail
$mail->Subject = "RM Solutions - Nova Senha"; // Define o Assunto
$mail->Body = '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>RM Solutions</title>
        <link rel="stylesheet" href="">
    </head>
    <body> 
        <br><br>
            Olá ' . $resultado->nomeUsuario . ', esta é a sua nova senha, 
            acesse e altere a senha em seu perfil.
        <br><br>
            Nova senha: ' . $novaSenha . '
        <br><br>
            http://rmsolutions.com.br/
        <br><br><br><br>
            Tenha um bom dia - att, equipe RM Solutions.
    </body>
</html>';
?>