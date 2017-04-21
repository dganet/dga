<?php
// Adiciona as dependencias necessárias
require dirname(dirname(__DIR__)).'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

function confirmEmail($email,$user,$creci){
    $mail = new PHPMailer;
    //Configuração de SMTP
    $mail->isSMTP();        //Informa que é um envio de email
    $mail->Host = 'mx1.hostinger.com.br';
    $mail->SMTPAuth = true;
    $mail->Username = 'admin@imobiliar.net.br';
    $mail->Password = 'LKLu2NxJ';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    //########################
   
    //Configuração de envio
    $mail->setFrom('admin@imobiliar.net.br', 'Mailer');
    $mail->addAddress($email,$user); //Informação vinda da classe que está chamando 
    //########################
    //Informações de anexos
    if (!$anexo == null){
        $mail->addAttachment($anexo);
    }
    $mail->isHTML(true);
    //#########################
    //Informações do email
    $mail->Subject = 'Confirmação de cadastro';
    $mail->Body = "
    Olá Sr".$user."<br>
    O seu cadastro está quase completo, para confirmar o seu email precisamos que clique no link abaixo<br> 
    <a href='http://localhost/gadeveloper/App/usuario/confirm/$creci'> CLIQUE AQUI PARA CONFIRMAR SEU EMAIL!</a>";

    $mail->AltBody = 'Mensagem para cliente não HTML';

    $isSend = $mail->send();
    if(!$isSend){
        echo 'Mensagem não pode ser enviada ';
        echo "Erro: ". $mail->ErrorInfo;
    }else{
        echo "mensagem enviada com sucesso!";
    }
}



