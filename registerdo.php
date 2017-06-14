<?php

header("content-type:text/html;charset=utf-8");
//取表单数据
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$password1 = $_REQUEST['password1'];
$password2 = sha1($password1);

//sql语句中字符串数据类型都要加引号，数字字段随便
if ($password===$password1){
    require_once 'dbconfig.php';
    $sql = "INSERT INTO user(id, username, password,status) VALUES (null,'$username','$password2','1')";
    $result = mysql_query ( $sql);
    if($result){
       
        echo "注册成功！！！<br/>";
        echo "<a href='login.php'>去登录</a>";
    }else{
        echo "注册失败！！！<br/>";
        echo "<a href='register.php'>重新注册</a>";
    }
}else{
    echo "两次密码不符！！！<br/>";
    echo "<script>alert('两次密码不符！');</script>";
    echo "<a href='register.php'>重新注册</a>";
}



