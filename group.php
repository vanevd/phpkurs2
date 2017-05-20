<?php

include "functions.php";

session_start();

$clients = $_SESSION['clients'];
$products = $_SESSION['products'];

$html = file_get_contents("group-template.html");

$html = render($html, "tr_client", $clients);
$html = render($html, "tr_product", $products);

echo $html;