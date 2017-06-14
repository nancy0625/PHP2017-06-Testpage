

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>添加选择题</title>
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
		

			<form class="m-t" role="form" action='select_insertdo.php' method='post'>
				<div class="panel-heading">
						<strong>录入选择题 ，并选中标准答案（单选选一项，多选选多项）</strong>
					</div>
					<div class="panel-body">
						
							<br />
							<div class="form-group">
								<h4>
									<label>选&nbsp;择&nbsp;科&nbsp;目：</label><label
										class="checkbox-inline"> <input type="radio"
										name='subject' value='php' checked />php
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='java' /> java
									</label> <label class="checkbox-inline"> <input type="radio"
										name='subject' value='android' /> android
									</label>
								</h4>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-question-circle fa-1x"> &nbsp;题&nbsp;&nbsp;目</i></span>
								<textarea name='title' class="form-control" rows="3"
									placeholder="在此输入问题描述"></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><label><input
										type="checkbox" name='answer1' value='true' /> 选项一 </label></span>
								<textarea name='item1' class="form-control" rows="3"
									placeholder="在此输入选项 内容"></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><label><input
										type="checkbox" name='answer2' value='true' /> 选项二</label></span>
								<textarea name='item2' class="form-control" rows="3"
									placeholder="在此输入选项 内容"></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><label><input
										type="checkbox" name='answer3' value='true' /> 选项三</label></span>
								<textarea name='item3' class="form-control" rows="3"
									placeholder="在此输入选项 内容"></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><label><input
										type="checkbox" name='answer4' value='true' /> 选项四</label></span>
								<textarea name='item4' class="form-control" rows="3"
									placeholder="在此输入选项 内容"></textarea>
							</div>
							<input type='submit' class="btn btn-success col-md-offset-6"
								value='保&nbsp;&nbsp;存' name="Submit" />
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