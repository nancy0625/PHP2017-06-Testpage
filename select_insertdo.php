<?php
header ( "content-type:text/html;charset=utf-8" );
$subject = $_REQUEST ['subject'];

$title = $_REQUEST ['title'];

 if(isset($_REQUEST['title'])){
     $answer[]=isset($_REQUEST['answer1'])?1:0;
     $answer[]=isset($_REQUEST['answer2'])?1:0;
     $answer[]=isset($_REQUEST['answer3'])?1:0;
     $answer[]=isset($_REQUEST['answer4'])?1:0;
 }
$item1 = $_REQUEST ['item1'];
$item2 = $_REQUEST ['item2'];
$item3 = $_REQUEST ['item3'];
$item4 = $_REQUEST ['item4'];


if (array_count_values($answer)['1']>1){
    $type='多';
}else{
    $type='单';
}


	require_once 'dbconfig.php';
	// 表单处理
	
	
	$sql="INSERT INTO select_question(subject,type,title,memo) VALUES ('$subject','$type','$title',null)";
	
	$result = mysql_query ($sql);
	$id = mysql_insert_id();
	
	$sqll = "INSERT INTO select_item (id,select_question_id,isanswer,content) values (null,'$id','$answer[0]','$item1'),(null,'$id','$answer[1]','$item2'),
	(null,'$id','$answer[2]','$item3'),(null,'$id','$answer[3]','$item4') ";
   
	$result1 = mysql_query($sqll);
	
	    if ($result1) {
	        echo "<script>alert('添加成功');</script>";
	        echo "<a href='index.php'>返回</a>";
	    } else {
	        echo "<script>alert('添加失败');</script>";
	        echo "<a href='select.php'>返回</a>";
	    }
	     
	   
	
	
	