<?php
require_once 'dbconfig.php';
header ( "content-type:text/html;charset=utf-8" );

// 取表单数据
$id = $_REQUEST ['id'];
$subject = $_REQUEST['subject'];
$title = $_REQUEST ['title'];


 if(isset($_REQUEST['title'])){
     $answer[]=isset($_REQUEST['answer1'])?1:0;
     $answer[]=isset($_REQUEST['answer2'])?1:0;
     $answer[]=isset($_REQUEST['answer3'])?1:0;
     $answer[]=isset($_REQUEST['answer4'])?1:0;
 }
 if (array_count_values($answer)['1']>1){
     $type='多';
 }else{
     $type='单';
 }
 $ids=[$_REQUEST['id1'],$_REQUEST['id2'],$_REQUEST['id3'],$_REQUEST['id4']];
$item1 = $_REQUEST['item1'];

$item2 = $_REQUEST['item2'];

$item3 = $_REQUEST['item3'];

$item4 = $_REQUEST['item4'];


// sql语句中字符串数据类型都要加引号，数字字段随便
$sql = "update select_question set title='$title',subject='$subject',type='$type' where id = $id";
$sql1 = "update select_item set isanswer='$answer[0]', content='$item1' where id=$ids[0]";
$sql2 = "update select_item set isanswer='$answer[1]', content='$item2' where id=$ids[1]";
$sql3 = "update select_item set isanswer='$answer[2]', content='$item3' where id=$ids[2]";
$sql4 = "update select_item set isanswer='$answer[3]', content='$item4' where id=$ids[3]";
$result = mysql_query($sql);
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
$result3 = mysql_query($sql3);
$result4 = mysql_query($sql4);

if ($result4) {
	echo "修改成功！！！<br/>";
	echo "<a href='select.php'>回到主页</a>";
} else {
	echo "修改失败！！！<br/>";
	echo "<a href='index.php'>系统错误</a>";
}