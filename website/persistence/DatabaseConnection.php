<?php
class DatabaseConnection{
    public $db="db";
    private $host="127.0.0.1";
    private $userName="user";
    private $password="password";
    
   function getConnection(){
        $dsn = 'mysql:host='. $this->host . ';dbname=' . $this->db;
        $pdo = new PDO($dsn,$this->userName,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}