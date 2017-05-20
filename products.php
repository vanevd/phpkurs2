<?php

include "functions.php";

session_start();

$products = $_SESSION['products'];

$html = file_get_contents("products-template.html");

$html = render($html, "tr_product", $products);

echo $html;