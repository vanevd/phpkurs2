<?php
require_once "Document.php";

class Invoice extends Document 
{
    public $vat_number;

    public function __construct($number, $date, $recepient, $issuer, $vat_number)
    {
        parent::__construct($number, $date, $recepient, $issuer);
        $this->vat_number = $vat_number;
    }

    public function print()
    {
        parent::print();
        echo "VAT: " . $this->vat_number . "\n";
        echo "ID: " . $this->get_id() . "\n";
    }
}
