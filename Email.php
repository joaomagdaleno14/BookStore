
<?php
include_once './PHPMailer_5.2.0/class.phpmailer.php';
include_once 'view/cadastropaciente.php';

$mail = new PHPMailer();
  

//Informa a classe que sera utiizado SMTP
$mail->isSMTP();        

//Aribui nome do host do SMTP                         
$mail->Host = "smtp.gmail.com";

//Atrbibua trye se o SMTP host requer autenticação para envio de emails
$mail->SMTPAuth = true;   

//Informa usuario e senha    
$mail->Username = "aulaifsul@gmail.com";                 
$mail->Password = "123456aula";    

//Si o SMTP requer encriptacao de  TLS 
//https://en.wikipedia.org/wiki/Transport_Layer_Security
$mail->SMTPSecure = "tls";  

//Configura a porta TCP para conexao
$mail->Port = 587;                                   

$mail->From = "joaomagdaleno.14@gmail.com";
$mail->FromName = "Consulta do Dentista";

$mail->addAddress("$setEmail");

$mail->isHTML(false);

$mail->Subject = "Confirmação de Cosnulta";
$mail->Body = "Sua consulta será no dia $setData.";


if(!$mail->send()) 
{
    echo "Erro ao enviar o email Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Email enviado com sucesso";
}
