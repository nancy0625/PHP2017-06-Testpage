
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
            <h3>添加成绩 c+</h3>
            <p>添加一个C+用户的成绩信息</p>
            
                <form class="m-t" role="form" method= "post"  action= "studentadddo.php">
                                 <input type='hidden' name='id' />
<br/>
                                        
                 
                                         
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user-md"  ></i></span>
                                            <input type="text" class="form-control" placeholder="studentId" name='studentId'/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-calendar"  ></i></span>
                                            <input type="text" class="form-control" placeholder="test_name" name='test_name'/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-align-justify"  ></i></span>
                                            <input type="text" class="form-control" placeholder="subject" name='subject'/>
                                        </div>
                                        
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="text" class="form-control" placeholder="mark" name='mark'/>
                                        </div>
                                     
                                     <input type="submit"  name= "Submit"  value= "添加成绩信息" class="btn btn-primary "> 
                                    <hr />
                                      <a href="student.php" >返回成绩主页</a>
                                   
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