<?php
require_once("../config/config.php");

class Database
{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $password = DB_PASS;

    private $connection;
    private $result;

    public function __construct(){
        $this->connection=new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    }

    public function query($query){
        $result=$this->connection->query($query);
    }
}
?>