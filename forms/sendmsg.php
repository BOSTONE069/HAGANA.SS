<?php

$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$message= mysqli_real_escape_string($mysqli, $_POST['message']);

$email2 = "customercare@haganass.com";
$subject = "Test Message";

if (strlen($name) > 50) {
    echo 'name_long';

} elseif (strlen($name) < 2) {
    echo 'name_short';

} elseif (strlen($email) > 50) {
    echo 'email_long';

} elseif (strlen($email) < 2) {
    echo 'email_short';

} elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    echo 'eformat';

} elseif (strlen($message) > 500) {
    echo 'message_long';

} elseif (strlen($message) < 3) {
    echo 'message_short';

} else {
	
	 //MAILER

    require 'phpmailer/PHPMailerAutoload.php';

    $mail = new PHPMailer;
	
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.haganass.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'customercare@haganass.com';                 // SMTP username
    $mail->Password = 'QvnC1hSY3n@7!';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

	$mail->AddReplyTo($email);
    $mail->From = $email2;
    $mail->FromName = $name;
    $mail->addAddress('customercare@haganass.com', 'Admin');     // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'true';
    }


}
?>