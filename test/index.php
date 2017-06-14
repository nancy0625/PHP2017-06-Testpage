<?php
// 获取用户名
session_start();
if (! isset($_SESSION['testers'])) {
    header("location:login.php");
}
    $userName = $_SESSION['testers']['userName'];

    $studentid = $_SESSION['testers']['studentId'];
// 传递模板参数
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>在线考试系统</title>
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="shortcut icon" href="favicon.ico"> <link href="../css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="../css/font-awesome.css?v=4.4.0" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css?v=4.1.0" rel="stylesheet">

</head>

<body class="gray-bg">
   <!--右侧部分开始-->
        <div id="left-wrapper" class="col-md-11 ">
          
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom:10">
                
			<div class="navbar-header">
				
				<a class="navbar-brand" href="index.php">学生在线测试系统</a>
			</div>
			<div
				style="color: blue; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">用户名：<?=$userName?>&nbsp;&nbsp;&nbsp;&nbsp; <a href="loginout.php"
					class="btn btn-danger square-btn-adjust">退出</a>
			</div>
		</nav>
		     
          
        </div>
      
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-6">
            
                <div class="contact-box">
                    <a href="listTest.php">
                        <div class="col-sm-4">
                            <div class="text-center">
<!--                                 <img alt="image" class="img-circle m-t-xs img-responsive" src="../img/progress.png"> -->
                                <div class="m-t-xs font-bold">TEST</div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                         <button class="btn btn-primary dim btn-large-dim" type="button"><i class="fa fa-money"></i>
                    </button>
                   
                            <h3><strong>在线考试</strong></h3>
                            
                            <p><i class="sk-spinner sk-spinner-double-bounce"></i> 小测试</p>
                           
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="contact-box">
                    <a href="../index.php">
                        <div class="col-sm-4">
                            <div class="text-center">

                                <div class="m-t-xs font-bold">USER</div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                         <button class="btn btn-warning dim btn-large-dim" type="button"><i class="fa fa-warning"></i>
                    </button>
                            <h3><strong>后台管理</strong></h3>
                            <p><i class="fa fa-map-marker"></i> 后台管理</p>
                            
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </div>
            </div>
           
           
 
        </div>
    </div>

    <!-- 全局js -->
    <script src="../js/jquery.min.js?v=2.1.4"></script>
    <script src="../js/bootstrap.min.js?v=3.3.6"></script>



    <!-- 自定义js -->
    <script src="../js/content.js?v=1.0.0"></script>



    <script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>

    
    

</body>

</html>
