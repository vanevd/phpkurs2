<?php
namespace PhpTest;
require_once __DIR__ . "/autoload.php";
require_once "vendor/autoload.php";

use \mysqli;
use PhpTest\Models\Client;
use \Twig_Loader_Filesystem;
use \Twig_Environment;

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$admin = 1;
$mysqli = new mysqli("localhost", "php-test", "php-test", "php-test");
$client = new Client($mysqli, 'clients');
//$html = file_get_contents("clients-template.html");
//$html = process_template($html);
if ($admin) {
    //$html = show_tag($html, "admin");
} else {
    //$html = hide_tag($html, "admin");
}
$error = "";
$success = "";
$first_name = "";
$last_name = "";
$email = "";
$phone = "";
$client_id = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_REQUEST['client_id'])) {
        $client_id = $_REQUEST['client_id'];
        $res = $client->find($client_id);
        if ($res) {
            $first_name = $client->first_name;
            $last_name = $client->last_name;
            $email = $client->email;
            $phone = $client->phone;
        } else {
            $error .= "Client not exists. Please enter new client data.";
        }    
    }    
    if (isset($_REQUEST['delete_id'])) {
        $delete_id = $_REQUEST['delete_id'];
        $client->delete($delete_id);
        $success = "Client deleted successfully";
    }    
    if (isset($_REQUEST['send_id'])) {
        $send_id = $_REQUEST['send_id'];
        $response = $client->send_email($send_id);
        if ($response['status'] == 'error') {
            $error = $response['error'];
        }
        if ($response['status'] == 'ok') {
            $success = $response['message'];
        }
    }    
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_REQUEST['first_name'];
    $last_name = $_REQUEST['last_name'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['phone'];
    if (strlen($first_name) == 0) {    
        $error .= "First name missing!";
    }    
    if (strlen($last_name) == 0) {    
        $error .= "Last name missing!";
    }    
    if (strlen($email) == 0) {    
        $error .= "Email missing!";
    }    
    if (strlen($phone) == 0) {    
        $error .= "Phone missing!";
    }    
    $client_id = $_REQUEST['client_id'];
    if (strlen($error) == 0) {
        if (strlen($client_id) > 0) {
            $client->find($client_id);
            $client->first_name = $_REQUEST['first_name'];
            $client->last_name = $_REQUEST['last_name'];
            $client->email = $_REQUEST['email'];
            $client->phone = $_REQUEST['phone'];
            $client->update();
            $success = "Client updated successfully";
        } else {    
            $client->first_name = $_REQUEST['first_name'];
            $client->last_name = $_REQUEST['last_name'];
            $client->email = $_REQUEST['email'];
            $client->phone = $_REQUEST['phone'];
            $client->insert();
            $success = "Client added successfully";
            $client_id = $client->id;
        }    
    }      
} else {


}

$clients = $client->all();

/*
$html = render($html, "tr_client", $clients);

$html = str_replace("{{error}}", $error, $html);
$html = str_replace("{{client_id}}", $client_id, $html);
$html = str_replace("{{first_name}}", $first_name, $html);
$html = str_replace("{{last_name}}", $last_name, $html);
$html = str_replace("{{email}}", $email, $html);
$html = str_replace("{{phone}}", $phone, $html);

echo $html;
*/
$data = [];
$data['clients'] = $clients;
$data['error'] = $error;
$data['success'] = $success;
$data['first_name'] = $first_name;
$data['last_name'] = $last_name;
$data['email'] = $email;
$data['phone'] = $phone;
$data['client_id'] = $client_id;
$data['admin'] = $admin;

echo $twig->render('clients-template.html', $data);
