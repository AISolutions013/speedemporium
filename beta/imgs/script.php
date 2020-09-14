<?php
$Assunto = $_POST['assunto'];
$Nome = $_POST['nome'];
$Email = $_POST['email'];
$Mensagem = $_POST['mensagem'];
date_default_timezone_set('Etc/UTC');
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "ai.solutionsbr@gmail.com";
$mail->Password = "fodase13!#";
$mail->setFrom('ai.solutionsbr@gmail.com','First Last');
$mail->addReplyTo('ai.solutionsbr@gmail.com','First Last');
$mail->addAddress('ai.solutionsbr@gmail.com','Ideal Web');
$mail->Subject = $Assunto;
$mail->msgHTML($Nome.'<br>'.$Email.'<br>'.$Mensagem);
$mail->AltBody = 'This is a plain-text message body';
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
echo "<script type='text/javascript'> document.location = 'index.html'; </script>";?>
