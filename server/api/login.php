<?php
require_once("../DB/db.php");
$username=$_POST['username'];
$password=$_POST['password'];

if($username==null || $password==null || $username=="" || $password=="") {//驗證資料是否齊全
    //資料不齊全
    echo json_encode(array("success"=>false,"reason"=>"data not enough"));
} else {
    //建立資料庫物件
    $db=new Database();
    /////////////////sql語句:搜尋對應username的資訊以及執行獲取結果///////////////////////////
    $query="SELECT * FROM `user` WHERE `username` = '$username'";
    $db->query($query);
    $res=$db->getResult();
    ///////////////////////////////////////////////////////////////////////////////////////////
    ///////////檢查query結果/////////////////////////////////////////
    if($res->rowCount()==1) {//如果存在該user
        $res=$res->fetch();
        if(password_verify($password,$res['password'])){//驗證密碼
            session_start();//建立登入的session
            $_SESSION['username']=$username;
            $_SESSION['nickname']=$res['nickname'];
            echo json_encode(array("success"=>true,"nickname"=>$res['nickname']));
        }else{
            echo json_encode(array("success"=>false,"reason"=>"data"));
        }
    } else {
        echo json_encode(array("success"=>false,"reason"=>"data"));
    }
    ////////////////////////////////////////////////////////////////
}
/*
傳入參數:
{
    username,
    password,
}
--------------------
回傳:
1.帳號或密碼錯誤
{
    success:false,
    reason:"data"
}
---
2.資料不齊全
{
    success:false,
    reason:"data not enough"
}
---
3.登入成功
{
    success:true
}
*/