<?php
require_once("../config/config.php");

class Database
{
    private $host = "127.0.0.1";
    private $dbname = "bigtwo";
    private $user = "root";
    private $password = "";

    private $connection;
    private $result;

    public function __construct(){
        $this->connection=new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }

    public function query($query){
        $this->result=$this->connection->query($query);
    }

    public function getResult(){
        return $this->result;
    }
}