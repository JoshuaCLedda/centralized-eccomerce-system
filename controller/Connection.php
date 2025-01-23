<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
class Connection
{
    public $con;
    // Connection to the database
    public function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'atbi');
        if ($this->con->connect_error) {
            die("Database connection failed: " . $this->con->connect_error);
        }
    }
}