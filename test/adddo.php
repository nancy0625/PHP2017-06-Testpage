<?php
header ( "content-type:text/html;charset=utf-8" );
$id = $_REQUEST ['id'];
$studentId = $_REQUEST ['studentId'];
$name = $_REQUEST ['name'];
$className = $_REQUEST ['className'];
$birthday = $_REQUEST ['birthday'];
$sex = $_REQUEST ['sex'];
$nation = $_REQUEST ['nation'];
$password=$_REQUEST['password'];
$password1=sha1($password);

	require_once '../dbconfig.php';
	$sql="INSERT INTO student(id,studentId, name,className,birthday,sex,nation,password) VALUES (null,'$studentId','$name','$className','$birthday','$sex','$nation','$password1')";
	$result = mysql_query ( $sql);
	if ($result) {
		echo "<script>alert('添加成功');</script>";
		echo "<a href='index.php'>返回</a>";
	} else {
		echo "<script>alert('添加失败');</script>";
		echo "<a href='index.php'>返回</a>";
	}
