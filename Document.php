<?php

class Document 
{
    public $date;
    public $number;
    public $recepient;
    public $issuer;
    private $id;
    static $print_count = 0;

    public function __construct($number, $date, $recepient, $issuer)
    {
        $this->number = $number;
        $this->date = $date;
        $this->recepient = $recepient;
        $this->issuer = $issuer;
    }

    public function print()
    {
        echo "ID: " . $this->id . "\n";
        echo "Number: " . $this->number . "\n";
        echo "Date: " . $this->date . "\n";
        echo "Recepient: " . $this->recepient . "\n";
        echo "Issuer: " . $this->issuer . "\n";
        self::$print_count++;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function get_id()
    {
        return $this->id;
    }

}
