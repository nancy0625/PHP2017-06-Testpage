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
		

			<form class="m-t" role="form" action='paper_insertdo.php' method='post'>
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
									class="fa fa-question-circle fa-1x"> &nbsp;试卷名称</i></span>
								<textarea name='name' class="form-control" rows="3"
									placeholder="在此输入问题描述"></textarea>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-gears fa-1x"> 题目数量</i></span> <input
									type="text" class="col-md-6"
									placeholder="在此输入题目数量" name='total'>
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i
									class="fa fa-pencil fa-1x"> &nbsp;&nbsp;备&nbsp;&nbsp;&nbsp;&nbsp;注&nbsp;&nbsp;&nbsp;</i></span>
								<textarea name='memo' class="form-control" rows="3"
									placeholder="在此输入备注"></textarea>
							</div>
							<input type='submit' class="btn btn-success col-md-offset-6"
								value='&nbsp;保&nbsp;存&nbsp;' />
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