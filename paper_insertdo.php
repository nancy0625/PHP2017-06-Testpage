<?php
header ( "content-type:text/html;charset=utf-8" );
$subject = $_REQUEST ['subject'];
$name = $_REQUEST ['name'];
$total = $_REQUEST['total'];
$memo = $_REQUEST['memo'];

	require_once 'dbconfig.php';

	// 查询选择题内容

	$sqq="select * from select_question where subject='$subject' order by rand() limit $total";
	
	$result2 = mysql_query ( $sqq );
	

	while($row=mysql_fetch_array($result2)){
	    $resultQuestion [] = $row;
	}

	$arr=array();
	foreach ($resultQuestion as $key=>$value){
	    $arr[]=$resultQuestion[$key][0];
	}
	
	$questionNo=implode(",", $arr);

	$sql="INSERT INTO paper(name,subject,total,content,memo) VALUES ('$name','$subject','$total','$questionNo',null)";

    $result = mysql_query($sql);
  
 
	    if ($result) {
	        echo "<script>alert('添加成功');</script>";
	        echo "<a href='paper.php'>返回</a>";
	    } else {
	        echo "<script>alert('添加失败');</script>";
	        echo "<a href='select.php'>返回</a>";
	    }
	     
	   
	
	
	