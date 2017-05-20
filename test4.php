<?php

session_start();

$clients = [];
$client = [];
$client['first_name'] = "Peter";
$client['last_name'] = "Petrov";
$client['email'] = "peter@abv.bg";
$client['phone'] = "0878111222";
$clients[] = $client;
$client = [];
$client['first_name'] = "Ivan";
$client['last_name'] = "Ivanov";
$client['email'] = "ivan@abv.bg";
$client['phone'] = "08783334444";
$clients[] = $client;
$client = [];
$client['first_name'] = "Dimitar";
$client['last_name'] = "Dimitrov";
$client['email'] = "dimitar@abv.bg";
$client['phone'] = "0878555666";
$clients[] = $client;

$products = [];
$product = [];
$product['name'] = "Laptop Lenovo";
$product['code'] = "123";
$product['price'] = 500;
$products[] = $product;
$product = [];
$product['name'] = "Laptop Acer";
$product['code'] = "124";
$product['price'] = 600;
$products[] = $product;
$product = [];
$product['name'] = "Laptop HP";
$product['code'] = "125";
$product['price'] = 700;
$products[] = $product;

$_SESSION['clients'] = $clients;
$_SESSION['products'] = $products;
