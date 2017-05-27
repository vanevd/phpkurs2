<?php

session_start();

$products = [];
$product = [];
$product['id'] = "0";
$product['name'] = "Tomatoes";
$product['code'] = "323";
$product['phone'] = "4.99";
$products[] = $product;
$product = [];
$product['id'] = "1";
$product['name'] = "Carrots";
$product['code'] = "320";
$product['price'] = "2.49";
$products[] = $product;
$product = [];
$product['id'] = "2";
$product['name'] = "Cherries";
$product['code'] = "177";
$product['price'] = "4.99";
$products[] = $product;
$product = [];
$product['id'] = "3";
$product['name'] = "Cherries";
$product['code'] = "177";
$product['price'] = "4.99";
$products[] = $product;
$product = [];
$product['id'] = "4";
$product['name'] = "Grapes";
$product['code'] = "179";
$product['price'] = "5.99";
$products[] = $product;
$product = [];
$product['id'] = "5";
$product['name'] = "Potatoes";
$product['code'] = "322";
$product['price'] = "1.29";
$products[] = $product;



$products = [];
$product = [];
$product['name'] = "Tomatoes";
$product['code'] = "323";
$product['price'] = 3.99;
$products[] = $product;
$product = [];
$product['name'] = "Carrots";
$product['code'] = "320";
$product['price'] = 2.49;
$products[] = $product;
$product = [];
$product['name'] = "Cherries";
$product['code'] = "177";
$product['price'] = 4.99;
$products[] = $product;
$products[] = $product;
$product = [];
$product['name'] = "Grapes";
$product['code'] = "179";
$product['price'] = 5.99;
$products[] = $product;
$products[] = $product;
$product = [];
$product['name'] = "Ptatoes";
$product['code'] = "322";
$product['price'] = 1.29;
$products[] = $product;

$_SESSION['products'] = $products;
$_SESSION['products'] = $products;







