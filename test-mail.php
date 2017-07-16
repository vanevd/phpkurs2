<?php
require_once "vendor/autoload.php";

$mail = new PHPMailer;

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$data = [];
$data['first_name'] = "Maya";
$data['last_name'] = "Taseva";
$data['product_name'] = "Laptop Dell";
$data['product_price'] = 1000;

$body =  $twig->render('mail-template.html', $data);


//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.abv.bg';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'test-php@abv.bg';                 // SMTP username
$mail->Password = 'test-php123';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('test-php@abv.bg', 'Test PHP');
$mail->addAddress('biomaya@yahoo.com');     // Add a recipient
$mail->addAddress('y.tsoneva@gmail.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Test Php';
$mail->Body    = $body;
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo "Message could not be sent.\n";
    echo "Mailer Error: " . $mail->ErrorInfo . "\n";
} else {
    echo "Message has been sent\n";
}