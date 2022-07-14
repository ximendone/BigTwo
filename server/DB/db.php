<?php
require_once("../config/config.php");

class Database
{
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $db;
    private $result;

    public function __construct(){
        $this->db=mysqli_connect($host,$user,$pass,$dbname);
    }

    public function query($query){
        $this->result=mysqli_query($this->db,$query);
    }

}
?>