<?php
class DatabaseConnection{
    public $db="db";
    private $host="127.0.0.1";
    private $userName="user";
    private $password="password";
    
    function getConnection(){
        $conn = new MySQLi($this->host,$this->userName,$this->password,$this->db);
        return $conn;
    }
}