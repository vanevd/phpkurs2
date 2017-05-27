<?php

include "functions.php";

session_start();

$products = $_SESSION['products'];

$html = file_get_contents("products-template.html");
$html = render($html, "tr_product", $products);

$error = "";
$product_id = "";
$name = "";
$code = "";
$price = "";



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_REQUEST['product_id'])) {
        $client_id = $_REQUEST['product_id'];
        if (isset($products[$product_id])) {
            $product_id = $products[$product_id]['product_id'];
            $name = $products[$product_id]['name'];
            $code = $products[$product_id]['code'];
            $price = $products[$product_id]['price'];
        } else {
            $error .= "Product doesn't exist. Please enter new product data.";
        }    
    }    
    if (isset($_REQUEST['delete_id'])) {
        $delete_id = $_REQUEST['delete_id'];
        if (isset($products[$delete_id])) {
            unset($products[$delete_id]);
        } else {
            $error .= "Product doesn't exist. Please enter valid product ID.";
        }    
    }    
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['name'];
    $code = $_REQUEST['code'];
    $price = $_REQUEST['price'];
    
    if (strlen($name) == 0) {    
        $error .= "Name missing!";
    }    
    if (strlen($code) == 0) {    
        $error .= "Code missing!";
    }    
    if (strlen($pice) == 0) {    
        $error .= "Price missing!";
    }    
    
    $product_id = $_REQUEST['product_id'];
    if (strlen($error) == 0) {
        if (strlen($client_id) > 0) {
            $products[$product_id]['name'] = $_REQUEST['name'];
            $products[$product_id]['code'] = $_REQUEST['code'];
            $products[$product_id]['price'] = $_REQUEST['price'];
            
        } else {    
            $product = [];
            $product['first_name'] = $_REQUEST['first_name'];
            $product['last_name'] = $_REQUEST['last_name'];
            $product['email'] = $_REQUEST['email'];
            $product['phone'] = $_REQUEST['phone'];
            $products[] = $product;
            end($products);
            $product_id = key($products);
            //$name = "";
            //$code = "";
            //$price = "";
            
        }    
    }      
} else {


}
$_SESSION['products'] = $products;


$html = render($html, "tr_product", $products);
$html = str_replace("{{error}}", $error, $html);
$html = str_replace("{{product_id}}", $product_id, $html);
$html = str_replace("{{name}}", $name, $html);
$html = str_replace("{{code}}", $code, $html);
$html = str_replace("{{price}}", $price, $html);




echo $html;