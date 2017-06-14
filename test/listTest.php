<?php
session_start();
$userName = $_SESSION['testers']['userName'];

$studentId = $_SESSION['testers']['studentId'];
require_once '../dbconfig.php';
// 查询试卷是否存在，如果有，就显示该卷的成绩。
$query = "select paper.id,name,paper.subject,content,mark from paper left  
join score on score.paper_id = paper.id and score.studentId = '$studentId'";
$result = @mysql_query($query);
while($testrow = @mysql_fetch_array($result)){
    $paperss[]=$testrow;
}
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--360浏览器优先以webkit内核解析-->


<title>在线考试</title>

<link rel="shortcut icon" href="favicon.ico">
<link href="../css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="../css/font-awesome.css?v=4.4.0" rel="stylesheet">

<link href="../css/animate.css" rel="stylesheet">
<link href="../css/style.css?v=4.1.0" rel="stylesheet">

</head>
<body class="gray-bg">
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-sm-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>在线测试</h5>

						<div class="ibox-tools">
							<a class="collapse-link"> <i class="fa fa-chevron-up"></i>
							</a> <a class="dropdown-toggle" data-toggle="dropdown" href="#">
								<i class="fa fa-wrench"></i>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li><a href="#">选项 01</a></li>
								<li><a href="#">选项 02</a></li>
							</ul>
							<a class="close-link"> <i class="fa fa-times"></i>
							</a>
						</div>
					</div>
					<div
						style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
				考生名：
				<?=$userName?>&nbsp;&nbsp; &nbsp;&nbsp;<a
							href="loginOut.php" class="btn btn-danger square-btn-adjust">退出登录</a>
					</div>
					
					<div class="ibox-content">
						<input type="text" class="form-control input-sm m-b-xs"
							id="filter" placeholder="搜索表格...">


						<table class="footable table table-hover" data-page-size="8"
							data-filter=#filter>
							<thead>
								<tr>
									<th>序号
									
									</td>
									<th>考试编号
									
									</td>
									<th>试卷号
									
									</td>
									<th>考试科目
									
									</td>
									<th>科目成绩
									
									</td>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
                                        <?php
                                        $line = 0;
                                        foreach ($paperss as $row) {
                                            $line ++;
                                            $linecolor = $line % 2 == 0 ? 'odd gradeX' : 'even gradeC';
                                            echo "<td>" . $line . "</td>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['subject'] . "</td>";
                                            echo "<td>" . ($row['mark'] == '' ? '<font color=red><b>待考</b></font>' : $row['mark']) . "</td>";
                                           if($row['mark']==''){
                                               echo "<td>" . "<a class='btn btn-info btn-sm shiny' href='"."paper_test.php?paper_test_id=" . $row['id']. "'\">
                                                   <i class='fa fa-paste'>现在考试</i></a>";
                                           }else{
                                              "<tr></td>";
                                           }
                                           
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
							<tfoot>
								<tr>
									<td colspan="5">
										<ul class="pagination pull-right"></ul>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
			<div id="foot-wrapper" align='center'>
				版权所有@2017，小试牛刀技术网，技术支持：cwx<br /> 小试牛刀网，网址：<a
					href='http://119.23.210.133/xiao'>http://119.23.210.133/xiao</a> <br />
				<br />
			</div>
		</div>
	</div>
	</nav>
	<!-- 全局js -->
	<script src="../js/jquery.min.js?v=2.1.4"></script>
	<script src="../js/bootstrap.min.js?v=3.3.6"></script>
	<script src="../js/plugins/footable/footable.all.min.js"></script>

	<!-- 自定义js -->
	<script src="../js/content.js?v=1.0.0"></script>
	<script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>

</body>

</html>
