<?php

require_once "vendor/autoload.php";

$loader = new Twig_Loader_Filesystem('./templates');

$twig = new Twig_Environment($loader);

$data = [];
$data['test_message'] = "Hello";
$data['error'] = "Access denied!";
$data['first_name'] = "Dimitar";
$data['price'] = round(4.4);

echo $twig->render('test12.html', $data);

