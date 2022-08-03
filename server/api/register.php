<?php
require_once("../DB/db.php");
//獲取請求發送的資料
$username=$_POST['username'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
$email=$_POST['email'];
$nickname=$_POST['nickname'];
///////////////////////////////////////////////

if($username=="" || $password=="" || $email!="" || $nickname=="") {//確保前端送來的資料不為空字串
    //建立資料庫物件
    $db=new Database();
    //sql語句
    $query="SELECT * FROM `user` WHERE `username` = '$username' || `email`='$email' ";
    //執行sql語法
    $db->query($query);
    //拿到執行結果
    $res=$db->getResult();
    //驗證資料是否可以拿來註冊成新成員
    if($res->rowCount()!=0) {//有同樣的username或是email被使用
        if($res->fetch()['username']==$username)//驗證是否有一樣的username被使用
            echo json_encode(array("success"=>false,"reason"=>"username has been used"));
        else
            echo json_encode(array("success"=>false,"reason"=>"email has been used"));
    } else {
        /////////////////將新user加入資料庫//////////////////
        $query="INSERT INTO `user` (`username`, `password`, `nickname`, `email`, `gameid`) VALUES ('$username', '$password', '$nickname', '$email', 0);";
        $db->query($query);
        echo json_encode(array("success"=>true));
        ////////////////////////////////////////////////////
    }
} else {
    //請求發來的資烙不齊全
    echo json_encode(array("success"=>false,"reason"=>"data not enough"));
}
/*
傳入參數:
{
    username,
    password,
    email,
    nickname
}
--------------------
回傳:
1.使用者名稱已經存在
{
    success:false,
    reason:"username has been used"
}
---
2.信箱已經使用
{
    success:false,
    reason:"email has been used"
}
---
3.資料不齊全
{
    success:false,
    reason:"data not enough"
}
---
4.註冊完成
{
    success:true
}
*/