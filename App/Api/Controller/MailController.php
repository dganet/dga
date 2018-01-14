<?php
namespace Api\Controller;
use \PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer;
class MailController{
    /**
        *   
    * @var Stirng $host - Endereço do servidor SMPT que será usado
    * @var String $email - Email que será usado para fazer a autenticação
    * @var String $pass - Senha do email 
    * @var String $secure - Tipo de segurança que será usada
    * @var Integer $port - Porta de conexão do servidor 
    * @var Boolean $auth - Se o servidor SMTP requer autenticação
    */
    private $host = 'smtp.gmail.com:';
    private $email = 'gadevelopper@gmail.com';
    private $pass = 'gadevelopper26112016';
    private $secure = 'tls';
    private $port = 587;
    private $auth = true;
    private $phpMailer = null;
    /**
    *   Metodo contrutor da classe que irá fazer a manipulação para posterioe envio de email
    */
    public function __construct(){
        $this->phpMailer = new PHPMailer();
        $this->phpMailer->isSMTP();
        $this->phpMailer->SMTPAuth = $this->auth;
        $this->phpMailer->Host = $this->host;
        $this->phpMailer->Username = $this->email;
        $this->phpMailer->Password = $this->pass;
        $this->phpMailer->SMTPSecure = $this->secure;
        $this->phpMailer->Port = $this->port;
    }
    /**
     * Função para gerar o email
     * 
     * @param String $dmail - Email do destinatário
     * @param String $dname - Nome do destinatário
     * @param String $subject - Assunto do Email
     * @param String $body - Corpo do email escritot em HTML
     * 
    */
    public function makeEmail($demail, $dname, $subject, $body){
        $this->phpMailer->setFrom('gadevelopper@gmail.com', 'Mailer');
        $this->phpMailer->addAddress($demail, $dname);
        $this->phpMailer->Subject = $subject;
        $this->phpMailer->Body = $body;
    }
    /**
     * Função para envio de email
     * 
     * @return Array - Retorna um array com as informações do envio
    */
    public function send(){
        if(!$this->phpMailer->send()){
            return 
            [
                'message'   => 'Email não pode ser enviado',
                'flag'      => false,
                'debug'     => 'Erro: '.$this->phpMailer->ErrorInfo
            ];
        }else{
            return 
            [
                'message'   => 'Email enviado com sucesso',
                'flag'      => true
            ];
        }    
    }

}


// // Adiciona as dependencias necessárias
// require dirname(dirname(__DIR__)).'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

// function confirmEmail($email,$user,$creci){
    
//     //Configuração de envio
//     $mail->setFrom('admin@imobiliar.net.br', 'Mailer');
//     $mail->addAddress($email,$user); //Informação vinda da classe que está chamando 
//     //########################
//     //Informações de anexos
//     // if (!$anexo == null){
//     //     $mail->addAttachment($anexo);
//     // }
//     // $mail->isHTML(true);
//     //#########################
//     //Informações do email
//     $mail->Subject = 'Cadastro Imobiliar ';
//     $mail->Body = "
//     <html>
//     <head>
//         <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
//     </head>
//     <body>
//     Olá Sr ".$user."<br>
//     O seu cadastro está quase completo, para confirmar o seu email precisamos que clique no link abaixo<br> 
//     <a href='http://localhost/App/usuario/confirm/$creci'> CLIQUE AQUI PARA CONFIRMAR SEU EMAIL!</a>
//     </body>
//     </html>
//     ";
//     $mail->AltBody = 'Mensagem para cliente não HTML';

//     $isSend = $mail->send();
//     if(!$isSend){
//         echo 'Mensagem não pode ser enviada ';
//         echo "Erro: ". $mail->ErrorInfo;
//     }else{
//         echo "mensagem enviada com sucesso!";
//     }
// }

// function forgotEmail($senha, $user, $email){
//      $mail = new PHPMailer;
//     //Configuração de SMTP
//     $mail->isSMTP();        //Informa que é um envio de email
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'gadevelopper@gmail.com';
//     $mail->Password = 'gadevelopper26112016';
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 587;
//     //########################
   
//     //Configuração de envio
//     $mail->setFrom('admin@imobiliar.net.br', 'Mailer');
//     $mail->addAddress($email,$user); //Informação vinda da classe que está chamando 
//     //########################
//     //Informações de anexos
//     if (!$anexo == null){
//         $mail->addAttachment($anexo);
//     }
//     $mail->isHTML(true);
//     //#########################
//     //Informações do email
//     $mail->Subject = 'Nova Senha ';
//     $mail->Body = "
//     <html>
//     <head>
//         <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
//     </head>
//     <body>
//     Olá Sr ".$user."<br>
//     Sua Senha foi modificada.<br>
//     Sua nova senha é : $senha
//     </body>
//     </html>
//     ";
//     $mail->AltBody = 'Mensagem para cliente não HTML';

//     $isSend = $mail->send();
//     if(!$isSend){
//         echo 'Mensagem não pode ser enviada ';
//         echo "Erro: ". $mail->ErrorInfo;
//     }else{
//         echo "mensagem enviada com sucesso!";
//     }
// }


