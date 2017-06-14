<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title> - 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.css?v=4.4.0" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/login.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
    <div class="signinpanel">
        <div class="row">
            <div class="col-sm-12">
                <form method="post" action="logindo.php">
                    <h4 class="no-margins">登录：</h4>
                    <p class="m-t-md">登录考试系统</p>
                    <input type="text" class="form-control uname" placeholder="请输入学号" name='studentId'/>
                    <input type="password" class="form-control pword m-b" placeholder="请输入密码" name='password'/>
                    <p class="text-muted text-center"> <a href="loginForget.php"><small>忘记密码了？</small></a> | <a href="add.php">注册一个新账号</a>
                </p>
                    <input type="submit"  name= "Submit"  value= "登录" class="btn btn-primary block full-width m-b"> 
               
                </form>
            </div>
        </div>
        <div class="signup-footer">
            <div class="pull-left">
                &copy; hAdmin
            </div>
        </div>
    </div>
</body>

</html>
