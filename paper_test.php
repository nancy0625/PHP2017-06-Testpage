

<?php
session_start ();
// 变量初始化
if(!isset($_SESSION ['tester'])){
	header("location:login.php");
}

$paperId = $_REQUEST ["test_paper_id"];
$studentid = $_SESSION ['tester'] ['studentId'];
// 是否已有个人试卷
$whereFindPaper = [ 
		'studentid' => $studentid,
		'paper_id' => $paperId 
];
require_once '../dbconfig.php';
$query = "select * from answer_paper where studentid='$studentid' and paper_id='$paperId'";
$resultPaper = @mysql_query ( $query );
if (! mysql_fetch_array ( $resultPaper )) {
	// ======================================================
	// 创建试卷
	// ======================================================
	$studentid = $_SESSION ['tester'] ['studentId'];
	// 将试卷的内容写入答题卷
	$sql = "select * from paper where id = '$paperId'";
	$paper = mysql_fetch_array ( mysql_query ( $sql ) );
	// 查询选择题内容
	$content = $paper ['content'];
	$questionNo = explode ( ',', $content );
	$answerNull = serialize ( [ 
			'a' => 0 
	] );
	// 写入空卷
	foreach ( $questionNo as $no ) {
		/*
		 * $data = [ 'studentid' => $studentid, 'paper_id' => $paperId,
		 * 'select_question_id' => $no, 'answer' => "" ];
		 */
		$sqlinert = "insert into answer_paper(studentid,paper_id,select_question_id,answer) values('$studentid','$paperId','$no','')";
		@mysql_query ( $sqlinert );
	}
}
// ======================================================
// 开始考试
// ======================================================
// 查询试卷
$queryPaper = "select * from paper where id='$paperId'";
$paper = mysql_fetch_array ( mysql_query ( $queryPaper ) );
$paperName = $paper ['name'];
$content = $paper ['content'];
$questionNo = explode ( ',', $content );
// 查询题目及选项状态
$query = "select select_question_id,type,title,answer 
        from select_question,answer_paper where answer_paper.studentid= '$studentid' and select_question.id = answer_paper.select_question_id 
        and answer_paper.paper_id= '$paperId' and select_question.id in($content)";
$result = mysql_query ( $query );
while ( $rowQuestion = mysql_fetch_array ( $result ) ) {
	$resultQuestion [] = $rowQuestion;
}
// 在选项表中查询选项内容
for($i = 0; $i < count ( $resultQuestion ); $i ++) {
	$resultQuestion [$i] ['answer'] = unserialize ( $resultQuestion [$i] ['answer'] );
	$select_question_id = $resultQuestion [$i] ['select_question_id'];
	$sqlitems = "select id,select_item.content from select_item where select_question_id ='$select_question_id'";
	$resultItems = mysql_query ( $sqlitems );
	$resultItemsArray = null;
	while ( $rowItems = mysql_fetch_array ( $resultItems ) ) {
		$resultItemsArray [] = $rowItems;
	}
	$resultQuestion [$i] ['items'] = $resultItemsArray;
}

// 传递参数
$selectQuestion = $resultQuestion;
// $this->assign("selectQuestion", $result);
// 获取用户名
$userName = $_SESSION ['tester'] ['userName'];
// $this->assign('userName', $userName);
// $this->assign('paperId', $paperId);
// $this->assign('paperName', $paperName);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>学生考试系统</title>
<!-- BOOTSTRAP STYLES-->
<link href="__STUDENT__/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="__STUDENT__/assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="__STUDENT__/assets/js/morris/morris-0.4.3.min.css"
	rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="__STUDENT__/assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans'
	rel='stylesheet' type='text/css' /> -->
<script type="text/javascript" src="js/laydate.js"></script>
</head>
<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-cls-top " role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">在线考试系统</a>
			</div>
			<div
				style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				考生名：
				<?=$userName?>
				&nbsp;&nbsp;<a href='{:url('register/edit')}'>修改密码</a>&nbsp;&nbsp;<a
					href="{:url('login/loginout')}"
					class="btn btn-danger square-btn-adjust">退出登录</a>
			</div>
		</nav>
		<div id="page-inner">
			<div class="row">
				<div class="col-md-12">
					<h2>我的考试</h2>
				</div>
			</div>
			<!-- /. ROW  -->
			<hr />
			<div class="row">
				<div class="col-md-12">
					<!-- Advanced Tables -->
					<div class="panel panel-default">
						<div class="panel-heading"></div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-striped table-bordered table-hover"
									id="dataTables-example">
									<thead>
										<tr>
											<th>序号</th>
											<th>考试编号</th>
											<th>考试名称</th>
											<th>科目</th>
											<th>成绩</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
										<?php
								$lineno = 0;
								foreach($result as $row) {
									$lineno ++;
									$linestyle = $lineno % 2 == 1 ? "odd gradeX" : "even gradeC";
									echo "<tr class='" . $linestyle . "'>";
									echo "<td>" . $lineno . "</td>";
									echo "<td>" .  $row ['id']. "</td>";
									echo "<td>" . $row ['name'] . "</td>";
									echo "<td>" . $row ['subject'] . "</td>";
									echo "<td>" .($row ['mark']==''?'<font color=red><b>待考</b></font>':$row ['mark']). "</td>";
									$url = url('edit',array('id'=>$row ['id']));
									$testurl = url('test',array('test_paper_id'=>$row ['id']));
									if($row ['mark']==''){
										echo "<td>&nbsp;<a class='btn btn-danger btn-sm shiny' href='" . $testurl . "'><i class='fa fa-trash-o'>&nbsp;现在考试</i></a></td>";
									}else{
										echo "<td></td>";
									}
									echo "</tr>";
								}
								?>
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /. WRAPPER  -->
	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="__STUDENT__/assets/js/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="__STUDENT__/assets/js/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="__STUDENT__/assets/js/jquery.metisMenu.js"></script>
	<!-- DATA TABLE SCRIPTS -->
	<script src="__STUDENT__/assets/js/dataTables/jquery.dataTables.js"></script>
	<script src="__STUDENT__/assets/js/dataTables/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTables-example').dataTable();
		});
	</script>
	<!-- CUSTOM SCRIPTS -->
	<script src="__STUDENT__/assets/js/custom.js"></script>
</body>
</html>