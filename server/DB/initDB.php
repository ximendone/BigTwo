<?php
require_once("../config/config.php");

$servername = DB_HOST;
$username = DB_USER;
$password = DB_PASS;
$db_name = DB_NAME;

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE $db_name";

    // 使用 exec() ，因為沒有結果返回
    $conn->exec($sql);
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);

    $sql = "CREATE TABLE user (
        username VARCHAR(15) NOT NULL, 
        password VARCHAR(15) NOT NULL,
        nickname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        gameid INT ,
        PRIMARY KEY (username)
        )";
    $conn->exec($sql);    
    $sql = "CREATE TABLE room (
        id VARCHAR(15) NOT NULL, 
        roomname VARCHAR(15) NOT NULL,
        private boolean NOT NULL,
        password VARCHAR(15),
        ingame boolean NOT NULL,
        chief VARCHAR(15) NOT NULL,
        port INT NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (chief) REFERENCES user(username)
        )";
    $conn->exec($sql);    

}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;