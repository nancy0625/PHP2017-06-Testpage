<?php
if (! isset ( $_SESSION )) {
	session_start ();
}
if (! isset ( $_SESSION ['userName'] )) {
	header ( "location:login.php" );
}
$userName = $_SESSION ['userName'];
// 当前文件名计算菜单名
$url = $_SERVER ['PHP_SELF']; // 当前文件文件名
$start = strrpos ( $url, '/' );
$end = strrpos ( $url, '.' );
$menuName = substr ( $url, $start + 1, $end - $start - 1 );

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> hAdmin- 主页</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="css/bootstrap.min.css?v=3.3.6" rel="stylesheet">
    <link href="css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css?v=4.1.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
   
			
	
        <!--左侧导航开始-->
        <nav class="navbar-default navbar-static-side" role="navigation">
        
            <div class="nav-close"><i class="fa fa-times-circle"></i>
            </div>
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        <i class="fa fa-area-chart"></i>
                                        <strong class="font-bold">hAdmin</strong>
                                    </span>
                                </span>
                            </a>
                        </div>
                        <div class="logo-element">hAdmin
                        </div>
                    </li>
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span class="ng-scope">分类</span>
                    </li>
                    <li>
                        <a class="J_menuItem" href="index1.php">
                            <i class="fa fa-home"></i>
                            <span class="nav-label">学生信息主页</span>
                        </a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="student.php">
                            <i class="fa fa-file-text-o"></i>
                            <span class="nav-label">学生成绩主页</span>
                        </a>
                    </li>
                    
                     <li>
                        <a class="J_menuItem" href="paper.php">
                            <i class="fa fa-file-text"></i>
                            <span class="nav-label">题库</span>
                        </a>
                    </li>
                    <li>
                        <a class="J_menuItem" href="select.php">
                            <i class="fa fa-tasks"></i>
                            <span class="nav-label">考试题</span>
                        </a>
                    </li>
                    
                   
                    
                    

                </ul>
            </div>
        </nav>
        <!--左侧导航结束-->
        <!--右侧部分开始-->
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">学生信息管理</a>
			</div>
			<div
				style="color: blue; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">用户名：<?=$userName?>&nbsp;&nbsp;<a
					href='newpassword.php'>修改密码</a>&nbsp;&nbsp; <a href="loginout.php"
					class="btn btn-danger square-btn-adjust">退出</a>
			</div>
		</nav>
                 </div>
            <div class="row J_mainContent" id="content-main">
                <iframe id="J_iframe" width="100%" height="100%" src="index.php?v=4.0" frameborder="0" data-id="index.php" seamless></iframe>
            </div>
        </div>
        <!--右侧部分结束-->
    </div>

    <!-- 全局js -->
    <script src="js/jquery.min.js?v=2.1.4"></script>
    <script src="js/bootstrap.min.js?v=3.3.6"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="js/plugins/layer/layer.min.js"></script>

    <!-- 自定义js -->
    <script src="js/hAdmin.js?v=4.1.0"></script>
    <script type="text/javascript" src="js/index.js"></script>

    <!-- 第三方插件 -->
    <script src="js/plugins/pace/pace.min.js"></script>
<div style="text-align:center;">