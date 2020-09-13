<?php
    $name = $_POST['name'];
    $selectOption = $_POST['selectOption'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $zipcode = $_POST['zipcode'];
    $city = $_POST['city'];
    $bairro = $_POST['bairro'];
    $message = $_POST['message'];
    

    date_default_timezone_set('Etc/UTC');
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = 'html';
    $mail->Host = 'smtp.hostinger.com.br';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "contato@speedemporium.com.br";
    $mail->Password = "5N!twK1>+Wn";
    $mail->setFrom('contato@speedemporium.com.br','First Last');
    $mail->addReplyTo('contato@speedemporium.com.br','First Last');
    $mail->addAddress('contato@speedemporium.com.br','Speed Emporium');
    $mail->Subject = $message;
    $mail->msgHTML($name.'<br>'.$selectOption.'<br>'.$message.'<br>'.$address.'<br>'.$zipcode.'<br>'.$city.'<br>'.$bairro.'<br>'.$message);
    $mail->AltBody = 'This is a plain-text message body';
    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
        echo "Message sent!";
    }
    echo "<script type='text/javascript'> document.location = 'index.html'; </script>";
