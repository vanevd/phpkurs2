<?php 
namespace PhpTest;

class Table
{
    protected $mysqli;
    protected $table;

    public function __construct($mysqli, $table)
    {
        $this->mysqli = $mysqli;
        $this->table = $table;
    }

    public function all()
    {
        $rows = [];
        $res = $this->mysqli->query("select * from " . $this->table);
        while ($row = $res->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    public function delete($id)
    {
        $query = sprintf("delete from %s where (id = %d)", $this->table, $id);
        $res = $this->mysqli->query($query);
    }    

    public function find($id)
    {
        $query = sprintf("select * from %s where (id = %d)", $this->table, $id);
        $res = $this->mysqli->query($query);
        if ($row = $res->fetch_assoc()) {
            foreach ($row as $key => $value) {
                $this->$key = $value;
            }
            return true;
        } else {
            return false;
        }
    }    
}