<?php
require_once "Client.php";

$mysqli = new mysqli("localhost", "php-test", "php-test", "php-test");

$client = new Client($mysqli, 'clients');

$client->first_name = "Dimitar";
$client->last_name = "Petrov";
$client->email = "dimitar@abv.bg";
$client->phone = "0878555222";
$client->insert();
echo $client->id . "\n";