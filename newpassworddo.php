<?php

header("content-type:text/html;charset=utf-8");
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['userName'])){
    header("location:login.php");
}else{
	//取json数据
	
	$oldpassword = sha1($_REQUEST['oldpassword']);
	$password = sha1($_REQUEST['password']);
	$password1 = sha1($_REQUEST['password1']);
	
	//新密码是否一致
	if($password!=$password1){
		echo "<script>alert('两次密码不一致！');</script>";
		echo "两次密码不一致！！<br/>";
		echo "<a href='newpassword.php'>返回</a>";
		
	}
	$username = $_SESSION['userName'];
	require_once 'dbconfig.php';
		$sql = "select * from user where username = '$username' and password='$oldpassword'";
		$result = mysql_query($sql,$conn);
		if($row = mysql_fetch_array($result)){
			//修改密码
			$id = $row['id'];
			$query = "update user set password = '$password' where id =$id";
			$result = mysql_query($query,$conn);
			if($result){
				echo "<script>alert('密码修改成功');</script>";
				echo "密码修改成功";
				echo "<a href='index.php'>返回</a>";
	
			}else{
				echo "<script>alert('密码修改失败了！！');</script>";
				echo "密码修改失败了！！<br/>";
				echo "<a href='newpassword.php'>返回</a>";
			}
		}else{
			echo "<script>alert('原始密码错误了！！');</script>";
			echo "原始密码错误了！！<br/>";
			echo "<a href='newpassword.php'>返回</a>";
		}
	}



?>