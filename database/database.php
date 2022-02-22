<?php

class Database {
    public $dsn = "mysql:host=localhost;dbname=php_oop";
    public $user = "root";
    public $pass = "";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO($this->dsn,$this->user,$this->pass);
        } 
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}


?>