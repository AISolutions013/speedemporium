<?php

require_once "./lib/recaptchalib.php";
require './lib/PHPMailer/PHPMailerAutoload.php';

$secret = "6Lc2_MwZAAAAAP8i3mwhgEr7JZFneZdRE5ksjfTd";
 
// empty response
$response = null;
 
// check secret key
$reCaptcha = new ReCaptcha($secret);

if ($_POST["g-recaptcha-response"]) {
  $response = $reCaptcha->verifyResponse(
      $_SERVER["REMOTE_ADDR"],
      $_POST["g-recaptcha-response"]
  );
}


if ($response != null && $response->success) {
  $mail = new PHPMailer;
  $mail->isSMTP();
  //$mail->SMTPDebug = 1;
  //$mail->Debugoutput = 'html';
  $mail->Host = 'smtp.hostinger.com';
  $mail->Port = 587;
  $mail->CharSet = 'UTF-8';
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;
  $mail->Username = "contato@speedemporium.com.br";
  $mail->Password = "5N!twK1>+Wn";
  $mail->setFrom('contato@speedemporium.com.br','Speed Emporium');
  $mail->addReplyTo('admspeedemporium@gmail.com','Speed Emporium');
  $mail->addAddress('contato@speedemporium.com.br','TESTE 3');
  $mail->Subject = 'Formulário de contato';
  $mail->msgHTML('Mensagem recebida através do site'.'<br>'
  .'Nome:'.$_POST['name'].'<br>'
  .'Função:'.$_POST['selectOption'].'<br>'
  .'E-mail:'.$_POST['email'].'<br>'
  .'Endereço:'.$_POST['address'].'<br>'
  .'Cep:'.$_POST['zipcode'].'<br>'
  .'Cidade:'.$_POST['city'].'<br>'
  .'Bairro:'.$_POST['bairro'].'<br>'
  .'Numero:'.$_POST['number'].'<br>'
  .'Mensagem:'.$_POST['message'].'<br>'
);
  $mail->AltBody = 'This is a plain-text message body';
  if (!$mail->send()) {
    echo "<script type='text/javascript'> document.location = 'index.html?email=error'; </script>";
  } else {
    echo "<script type='text/javascript'> document.location = 'index.html?email=success'; </script>";
  }

} else {
  echo "<script type='text/javascript'> document.location = 'contact.html?email=error-captcha'; </script>";
}
?>