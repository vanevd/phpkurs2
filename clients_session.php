<?php

include "functions.php";

session_start();

$admin = 1;

if (isset($_SESSION['clients'])) {
    $clients = $_SESSION['clients'];
} else {
    $clients = [];
}

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
        if (isset($clients[$client_id])) {
            $first_name = $clients[$client_id]['first_name'];
            $last_name = $clients[$client_id]['last_name'];
            $email = $clients[$client_id]['email'];
            $phone = $clients[$client_id]['phone'];
        } else {
            $error .= "Client not exists. Please enter new client data.";
        }    
    }    
    if (isset($_REQUEST['delete_id'])) {
        $delete_id = $_REQUEST['delete_id'];
        if (isset($clients[$delete_id])) {
            unset($clients[$delete_id]);
        } else {
            $error .= "Client not exists. Please enter valid client ID.";
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
            $clients[$client_id]['first_name'] = $_REQUEST['first_name'];
            $clients[$client_id]['last_name'] = $_REQUEST['last_name'];
            $clients[$client_id]['email'] = $_REQUEST['email'];
            $clients[$client_id]['phone'] = $_REQUEST['phone'];
        } else {    
            $client = [];
            $client['first_name'] = $_REQUEST['first_name'];
            $client['last_name'] = $_REQUEST['last_name'];
            $client['email'] = $_REQUEST['email'];
            $client['phone'] = $_REQUEST['phone'];
            $clients[] = $client;
            end($clients);
            $client_id = key($clients);
            //$first_name = "";
            //$last_name = "";
            //$email = "";
            //$phone = "";
        }    
    }      
} else {


}
$_SESSION['clients'] = $clients;


$html = render($html, "tr_client", $clients);
$html = str_replace("{{error}}", $error, $html);
$html = str_replace("{{client_id}}", $client_id, $html);
$html = str_replace("{{first_name}}", $first_name, $html);
$html = str_replace("{{last_name}}", $last_name, $html);
$html = str_replace("{{email}}", $email, $html);
$html = str_replace("{{phone}}", $phone, $html);

echo $html;