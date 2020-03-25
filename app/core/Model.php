<?php


namespace app\core;


use app\config\Database;

abstract class Model {
    protected $db;
    protected $con;

    public function __construct() {
        $this->db = new Database();
        $this->con = $this->db->connect();
    }
}