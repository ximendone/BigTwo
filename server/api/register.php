<?php
require_once("../DB/db.php");
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$nickname=$_POST['nickname'];

if($username!=null && $password!=null && $email!=null && $nickname!=null) {
    $db=new Database();
    $query="SELECT `username` FROM `user` WHERE `username` = '$username'";
    $db->query($query);
    $res=$db->getResult();
    if($res->rowCount()!=0) {
        echo json_encode(array("success"=>false,"reason"=>"username has been used"));
    } else {
        $query="INSERT INTO `user` (`username`, `password`, `nickname`, `email`, `gameid`) VALUES ('$username', '$password', '$nickname', '$email', null);";
        $db->query($query);
        echo json_decode(array("success"=>true));
    }
} else {
    echo json_encode(array("success"=>false,"reason"=>"data not enough"));
}