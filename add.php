

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>添加学生信息</title>
<meta name="keywords" content="">
<meta name="description" content="">

<link rel="shortcut icon" href="favicon.ico">
<link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
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
			<h3>添加学生</h3>
			<p>添加一个学生的信息</p>

			<form class="m-t" role="form" method="post" action="adddo.php">

				<input type='hidden' name='id' /> <br />
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span> <input
						type="text" class="form-control" placeholder="StudentId"
						name='studentId' />
				</div>


				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
					<input type="text" class="form-control" placeholder="name"
						name='name' />
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-university"></i></span>
					<input type="text" class="form-control" placeholder="className"
						name='className' />
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-gift"></i></span> <input
						type="text" class="form-control" placeholder="birthday"
						name='birthday' />
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-female"></i></span>
					<div align='left'>
						&nbsp;&nbsp; <input type="radio" placeholder="性别" name='sex'
							value='男' <?='男'?'checked':''?> />男
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio"
							placeholder="性别" name='sex' value='女' <?='女'?'checked':''?> />女
					</div>
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-flag"></i></span> <input
						type="text" class="form-control" placeholder="nation"
						name='nation' />
				</div>
				<div class="form-group input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span> <input
						type="password" class="form-control" placeholder="password"
						name='password' />

				</div>

				<input type="submit" name="Submit" value="学生登记信息"
					class="btn btn-primary ">
				<hr />
				<a href="login.php">在这里登录</a>
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