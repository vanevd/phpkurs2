<?php
$products = [];
$product = [];
$product['id'] = "0";
$product['name'] = "Tomatoes";
$product['code'] = "323";
$product['price'] = "3,99";
$product[] = $product;
$product = [];
$product['id'] = "1";
$product['name'] = "Carrots";
$product['code'] = "320";
$product['price'] = "2,49";
$product[] = $product;
$product = [];
$product['id'] = "2";
$product['name'] = "Cherries";
$product['code'] = "177";
$product['price'] = "4,99";
$products[] = $product;
$product = [];
$product['id'] = "3";
$product['name'] = "Grapes";
$product['code'] = "179";
$product['price'] = "5,99";
$products[] = $product;

$products[] = "Fruits and vegetables";
echo $products[0][''] . "\n";
var_dump($products);

