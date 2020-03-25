<?php

namespace app\config;

use PDO;
use PDOException;

class Database {

    private $host = 'https://mysql.zzz.com.ua';
    private $dbname = 'timur265';
    private $password = '6623434asS';
    private $username = 'round';
    private $conn;


    public function connect() {
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->conn;
    }
}