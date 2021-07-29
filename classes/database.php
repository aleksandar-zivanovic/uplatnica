<?php

require_once 'db_config.php';

class Database {

    public $conn;

    public function __construct() {
        $this->db_connection();
    }

    public function db_connection() {
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_errno) {
            die("greska u konekciji sa bazom: " . mysqli_connect_error());
        }
    }
    
    public function query($sql){
        $result = $this->conn->query($sql)
                or die("<i>Query from query() method failed:</i> <pre>" . $this->conn->error ."</pre>");
        return $result;
    }

}

$db = new Database();
