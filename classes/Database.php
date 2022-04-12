<?php

class Database {
    private $server_name = "localhost";
    private $username = "root";
    private $password = "root"; // blank for XAMPP users
    private $db_name = "the_company";
    protected $conn;

    public function __construct()
    {
        # Create the connection to the db
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        # Check for connection error
        if ($this->conn->connect_error){
            die("Unable to connect to database: " . $this->conn->connect_error);
        }
    }
}