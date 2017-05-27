<?php

include "functions.php";

session_start();

$products = $_SESSION['products'];

$html = file_get_contents("products-template.html");
$error = "";
$id = "";
$name = "";
$code = "";
$price = "";


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_REQUEST['product_id'])) {
        $client_id = $_REQUEST['product_id'];
        if (isset($products[$product_id])) {
            $first_name = $products[$product_id]['id'];
            $last_name = $products[$product_id]['name'];
            $email = $products[$product_id]['code'];
            $phone = $products[$product_id]['price'];
        } else {
            $error .= "Product doesn't exists. Please enter new product data.";
        }    
    }    
    if (isset($_REQUEST['delete_id'])) {
        $delete_id = $_REQUEST['delete_id'];
        if (isset($products[$delete_id])) {
            unset($products[$delete_id]);
        } else {
            $error .= "Product doesn't exists. Please enter valid product ID.";
        }    
    }    
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_REQUEST['id'];
    $name = $_REQUEST['name'];
    $code = $_REQUEST['code'];
    $price = $_REQUEST['price'];
    if (strlen($id) == 0) {    
        $error .= "ID missing!";
    }    
    if (strlen($name) == 0) {    
        $error .= "Name missing!";
    }    
    if (strlen($code) == 0) {    
        $error .= "Code missing!";
    }    
    if (strlen($price) == 0) {    
        $error .= "Price missing!";
    }    
    $product_id = $_REQUEST['product_id'];
    if (strlen($error) == 0) {
        if (strlen($product_id) > 0) {
            $products[$product_id]['id'] = $_REQUEST['id'];
            $products[$product_id]['name'] = $_REQUEST['name'];
            $products[$product_id]['code'] = $_REQUEST['code'];
            $products[$product_id]['price'] = $_REQUEST['price'];
        } else {    
            $product = [];
            $product['id'] = $_REQUEST['id'];
            $product['name'] = $_REQUEST['name'];
            $product['code'] = $_REQUEST['code'];
            $product['price'] = $_REQUEST['price'];
            $products[] = $product;
            end($products);
            $product_id = key($products);
            
        }    
    }      
} else {


}
$_SESSION['products'] = $products;


$html = render($html, "tr_product", $products);
$html = str_replace("{{error}}", $error, $html);
$html = str_replace("{{id}}", $id, $html);
$html = str_replace("{{name}}", $name, $html);
$html = str_replace("{{code}}", $code, $html);
$html = str_replace("{{price}}", $price, $html);


echo $html;