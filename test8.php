<?php
require_once "Receipt.php";
require_once "Invoice.php";
require_once "Document.php";

$documents = [];

$document = new Receipt(1, "10.05.2017", "Ivan Ivanov", "Firm");
$document->set_id(1);
$document->print();
$documents[] = $document;

$document = new Invoice(2, "11.05.2017", "Peter Petrov", "Firm", "BG123456789");
$document->set_id(2);
$documents[] = $document;

foreach ($documents as $document) {
    $document->print();
    echo "\n";
}

echo Document::$print_count . "\n";

