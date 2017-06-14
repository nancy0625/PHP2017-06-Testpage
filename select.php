

<?php
require_once 'dbconfig.php';
// 访问student
$query = "select * from select_question";
$result = mysql_query($query);
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--360浏览器优先以webkit内核解析-->


<title>- 主页示例</title>

<link rel="shortcut icon" href="favicon.ico">
<link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
<link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">

<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css?v=4.1.0" rel="stylesheet">

</head>
<body class="gray-bg">
	<div class="wrapper wrapper-content animated fadeInRight">
		<div class="row">
			<div class="col-sm-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>学生信息管理</h5>

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
					<div class="ibox-content">
						<input type="text" class="form-control input-sm m-b-xs"
							id="filter" placeholder="搜索表格..."> <a
							class='btn btn-info btn-sm shiny' href='select_insert.php'><i
							class='fa fa-plus-square'> 增加题目信息</i></a>

						<table class="footable table table-stripped" data-page-size="8"
							data-filter=#filter>
							<thead>
								<tr>
									<th>题号</th>
									<th>科目</th>
									<th>类别</th>
									<th>题目</th>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
                                       <?php
                                    $lineno = 0;
                                    while ($row = mysql_fetch_array($result)) {
                                        $lineno ++;
                                        $linestyle = $lineno % 2 == 1 ? "odd gradeX" : "even gradeC";
                                        echo "<tr class='" . $linestyle . "'>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['subject'] . "</td>";
                                        echo "<td>" . $row['type'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td >" . "<a class='btn btn-info btn-sm shiny' href=\"select_edit.php?id='" . $row['id'] . "'\">
					    <i class='fa fa-tag'> 编辑</i></a>&nbsp;&nbsp;<a class='btn btn-danger btn-sm shiny' href=\"select_delete.php?id='" . $row['id'] . "'\">
							    <i class='fa fa-remove'>删除</i></a> </td>";
                                        
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
		</div>
	</div>
	</nav>
	<!-- 全局js -->
	<script src="js/jquery.min.js?v=2.1.4"></script>
	<script src="js/bootstrap.min.js?v=3.3.6"></script>
	<script src="js/plugins/footable/footable.all.min.js"></script>

	<!-- 自定义js -->
	<script src="js/content.js?v=1.0.0"></script>
	<script>
        $(document).ready(function() {

            $('.footable').footable();
            $('.footable2').footable();

        });

    </script>




</body>

</html>
