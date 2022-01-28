<?php

class config {
    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $databasename = "e-commerce";
    private $con;
    public function __construct() {
        $this->con = new mysqli($this->hostname,$this->username,$this->password,$this->databasename);
        
    }

    public function runDML(string $query) : bool
    {
        $result = $this->con->query($query);
        if ($result) {
            return true;
        }else {
            return false;
        }
    }

    public function runDQL(string $query) : array
    {
        $result = $this->con->query($query);
        if ($result) {
            return $result;
        }
        return [];
    }
    
}


?>