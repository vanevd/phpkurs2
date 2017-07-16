<?php
namespace PhpTest\Models;

use PhpTest\Table;

class Client extends Table
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;


    public function insert()
    {
        $query = sprintf("insert into clients(first_name, last_name, email, phone) values('%s', '%s', '%s', '%s')",$this->first_name, $this->last_name, $this->email, $this->phone);
        $this->mysqli->query($query);
        $this->id = $this->mysqli->insert_id;
    }

    public function update()
    {
        $query = sprintf("update clients set first_name='%s', last_name='%s', email='%s', phone='%s' where (id = %d)",$this->first_name, $this->last_name, $this->email, $this->phone, $this->id);
        $this->mysqli->query($query);
    }

    public function send_email($id) 
    {
        $this->find($id);
        $mail = new \PHPMailer;

        $loader = new \Twig_Loader_Filesystem('./templates');

        $twig = new \Twig_Environment($loader);

        $data = [];
        $data['first_name'] = $this->first_name;
        $data['last_name'] = $this->last_name;
        $data['product_name'] = "Laptop Dell";
        $data['product_price'] = 1000;

        $body =  $twig->render('mail-template.html', $data);

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.abv.bg';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'test-php@abv.bg';                 // SMTP username
        $mail->Password = 'test-php123';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 465;                                    // TCP port to connect to

        $mail->setFrom('test-php@abv.bg', 'Test PHP');
        $mail->addAddress($this->email);     // Add a recipient
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Test Php';
        $mail->Body    = $body;

        //$mail->send();
        $response =[];
        if(!$mail->send()) {
            $response['status'] = 'error';
            $response['error'] = "Message could not be sent.<br>" . "Mailer Error: " . $mail->ErrorInfo . "<br>";
        } else {
            $response['status'] = 'ok';
            $response['message'] = 'Message has been sent successfully<br>';
        }
        return $response;
        
    }

}
