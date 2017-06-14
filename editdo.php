<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$id = $_REQUEST ['id'];
$studentId = $_REQUEST ['studentId'];
$name = $_REQUEST ['name'];
$className = $_REQUEST ['className'];
$birthday = $_REQUEST ['birthday'];
$sex = $_REQUEST ['sex'];
$nation = $_REQUEST ['nation'];

// sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "update student set studentId ='$studentId',name = '$name',className = '$className',birthday = '$birthday',sex ='$sex',nation='$nation' where id = $id";
if (mysql_query ( $sql )) {
	echo "修改成功！！！<br/>";
	echo "<a href='index1.php'>回到学生主页</a>";
} else {
	echo "修改失败！！！<br/>";
	echo "<a href='index.php'>系统错误</a>";
}