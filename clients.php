<?php
namespace PhpTest;
require_once __DIR__ . "/autoload.php";

use \mysqli;
use PhpTest\Models\Client;

$admin = 1;
$mysqli = new mysqli("localhost", "php-test", "php-test", "php-test");
$client = new Client($mysqli, 'clients');
$html = file_get_contents("clients-template.html");
$html = process_template($html);
if ($admin) {
    $html = show_tag($html, "admin");
} else {
    $html = hide_tag($html, "admin");
}
$error = "";
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
        } else {    
            $client->first_name = $_REQUEST['first_name'];
            $client->last_name = $_REQUEST['last_name'];
            $client->email = $_REQUEST['email'];
            $client->phone = $_REQUEST['phone'];
            $client->insert();
            $client_id = $client->id;
        }    
    }      
} else {


}

$clients = $client->all();

$html = render($html, "tr_client", $clients);
$html = str_replace("{{error}}", $error, $html);
$html = str_replace("{{client_id}}", $client_id, $html);
$html = str_replace("{{first_name}}", $first_name, $html);
$html = str_replace("{{last_name}}", $last_name, $html);
$html = str_replace("{{email}}", $email, $html);
$html = str_replace("{{phone}}", $phone, $html);

echo $html;