<?php
header ( "content-type:text/html;charset=utf-8" );
$id = $_REQUEST ['id'];
$studentId = $_REQUEST ['studentId'];
$test_name = $_REQUEST ['test_name'];
$subject= $_REQUEST ['subject'];
$mark = $_REQUEST ['mark'];


	require_once 'dbconfig.php';
	$sql="INSERT INTO score(id,studentId, test_name,subject,mark) VALUES (null,'$studentId','$test_name','$subject','$mark')";

	$result = mysql_query ( $sql);
	if ($result) {
		echo "<script>alert('添加成功');</script>";
		echo "<a href='student.php'>返回</a>";
	} else {
		echo "<script>alert('添加失败');</script>";
		echo "<a href='index.php'>返回</a>";
	}
