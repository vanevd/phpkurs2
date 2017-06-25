<?php

$mysqli = mysqli_connect("localhost", "php-test", "php-test", "php-test");

$res = mysqli_query($mysqli, "insert into clients(first_name, last_name, phone, email) values('Petar', 'Petrov', '088111222', 'ivan@abv.bg')");
$client_id = mysqli_insert_id($mysqli);
echo "client_id: " . $client_id . "\n";
$res = mysqli_query($mysqli, "SELECT * from clients");

while ($row = mysqli_fetch_assoc($res)) {

    var_dump($row);

}    
