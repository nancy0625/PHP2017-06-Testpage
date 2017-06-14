

 <?php
require_once 'dbconfig.php';
// 访问student
$query = "select * from student";
$result = mysql_query($query);
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--360浏览器优先以webkit内核解析-->


<title>考试线学习系统</title>

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
						<h5>考试线学习系统</h5>

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
							class='btn btn-info btn-sm shiny' href='add.php'><i
							class='fa fa-plus-square'> 增加学生信息</i></a>

						<table class="footable table table-stripped" data-page-size="8"
							data-filter=#filter>
							<thead>
								<tr>
									<th>学号
									
									</td>
									<th>姓名
									
									</td>
									<th>班级
									
									</td>
									<th>生日
									
									</td>
									<th>性别
									
									</td>
									<th>民族
									
									</td>
									<th>操作</th>
								</tr>
							</thead>
							<tbody>
                                        <?php
                                        $line = 0;
                                        while ($row = mysql_fetch_array($result)) {
                                            $line ++;
                                            $linecolor = $line % 2 == 0 ? 'odd gradeX' : 'even gradeC';
                                            echo "<tr>";
                                            echo "<td>" . $row['studentId'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['className'] . "</td>";
                                            echo "<td>" . $row['birthday'] . "</td>";
                                            echo "<td>" . $row['sex'] . "</td>";
                                            echo "<td>" . $row['nation'] . "</td>";
                                            echo "<td>" . "<a class='btn btn-info btn-sm shiny' href=\"edit1.php?id='" . $row['id'] . "'\"><i class='fa fa-paste'> 编辑</i></a>&nbsp;&nbsp;<a class='btn btn-danger btn-sm shiny' href=\"delete.php?id='" . $row['id'] . "'\"><i class='fa fa-remove'>删除</i></a></td>";
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
