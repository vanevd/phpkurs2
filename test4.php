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

$_SESSION['clients'] = $clients;