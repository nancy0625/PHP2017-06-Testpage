
<?php

header("content-type:text/html;charset=utf-8");

	//取json数据
	
	$username=$_REQUEST['username'];
	$password = sha1($_REQUEST['password']);
	$password1 = sha1($_REQUEST['password1']);
	
	//新密码是否一致
	if($password!=$password1){
		echo "<script>alert('两次密码不一致！');</script>";
		echo "两次密码不一致！！<br/>";
		 echo "<a href='loginForget.php'>返回</a>";
		
	}else{
	    require_once 'dbconfig.php';
	    $sql = "select * from user where username = '$username' ";
	    $result = mysql_query($sql,$conn);
	    if($row = mysql_fetch_array($result)){
	        //修改密码
	        $id = $row['id'];
	        $query = "update user set password = '$password' where id = '$id' ";
	        $result = mysql_query($query,$conn);
	        if($result){
	            echo "<script>alert('密码重置成功');</script>";
	            echo "密码重置成功";
	            echo "<a href='index.php'>返回</a>";
	    
	        }else{
	            echo "<script>alert('密码重置失败了！！');</script>";
	            echo "密码重置失败了！！<br/>";
	            echo "<a href='loginForget.php'>返回</a>";
	        }
	    }
	}
	
	

?>