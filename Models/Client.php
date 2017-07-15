<?php
namespace PhpTest;

//use PhpTest\Table;

class Client extends Table
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $phone;


    public function insert()
    {
        $query = sprintf("insert into clients(first_name, last_name, email, phone) values('%s', '%s', '%s', '%s')",$this->first_name, $this->last_name, $this->email, $this->phone);
        $this->mysqli->query($query);
        $this->id = $this->mysqli->insert_id;
    }

    public function update()
    {
        $query = sprintf("update clients set first_name='%s', last_name='%s', email='%s', phone='%s' where (id = %d)",$this->first_name, $this->last_name, $this->email, $this->phone, $this->id);
        $this->mysqli->query($query);
    }

}
