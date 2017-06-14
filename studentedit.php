<?php
if (! isset($_SESSION)) {
    session_start();
}
if (! isset($_SESSION['userName'])) {
    header("location:login.php");
}
$userName = $_SESSION['userName'];

// 访问数据库，查询学生表指定学号的学生
require_once 'dbconfig.php';
if (! isset($_REQUEST['id'])) {
    header("location:index.php");
}
$id = $_REQUEST['id'];
$sql = "select * from score where id = $id";
// exit($sql);
$result = mysql_query($sql);
$row = mysql_fetch_array($result)?>



<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>添加成绩信息</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>

</head>

<body class="gray-bg">

	<div class="middle-box text-center loginscreen   animated fadeInDown">
		<div>
			<div>

				<h1 class="logo-name">c+</h1>

			</div>
			<h3>C+</h3>
			<p>修改一个的成绩信息</p>

			<form class="m-t" role="form" action='studenteditdo.php' method='post'>
				<input type='hidden' name='id' value='<?=$row ['id']?>' />  <br />
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa 	fa-user"></i></span>
					<input type="text" class="form-control" name='studentId'
						value='<?=$row ['studentId']?>' />
				</div>


				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
					<input type="text" class="form-control" name='test_name'
						value='<?=$row ['test_name']?>' />
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-university"></i></span>
					<input type="text" class="form-control" name='subject'
						value='<?=$row ['subject']?>' />
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
					<input type="text" class="form-control" name='mark'
						value='<?=$row ['mark']?>' />
				</div>

				<input type="submit" name="Submit" value="修改成绩信息"
					class="btn btn-primary ">
				<hr />
				<a href="index.php">返回</a>

			</form>
		</div>
	</div>

	<!-- 全局js -->
	<script src="js/jquery.min.js?v=2.1.4"></script>
	<script src="js/bootstrap.min.js?v=3.3.6"></script>
	<!-- iCheck -->
	<script src="js/plugins/iCheck/icheck.min.js"></script>
	<script>
        $(document).ready(function () {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>




</body>

	</html>