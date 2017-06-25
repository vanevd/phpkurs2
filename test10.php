<?php

$mysqli = new mysqli("localhost", "php-test", "php-test", "php-test");

$res = $mysqli->query("insert into clients(first_name, last_name, phone, email) values('Petar', 'Petrov', '088111222', 'ivan@abv.bg')");
$client_id = $mysqli->insert_id;
echo "client_id: " . $client_id . "\n";
$res = $mysqli->query("SELECT * from clients");

while ($row = $res->fetch_assoc()) {

    var_dump($row);

}    
