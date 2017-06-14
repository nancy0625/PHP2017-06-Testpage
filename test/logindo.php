<?php
session_start();
if (isset($_POST['studentId'])) {
    if (isset($_SESSION['testers'])) {
        session_destroy();
    }
    $studentId = $_POST['studentId'];
    $password = $_POST['password'];
    // 计算摘要
    $password2 = sha1($password);
    include_once '../dbconfig.php';
    // 根据用户名和密码去查询学生帐号表
    $qq = "select * from student where studentId ='$studentId' and password = '$password2'";
    $result = @mysql_query($qq);
    // 有满足查询条件的记录
    if ($row = mysql_fetch_array($result)) {
        // 使用 authority 保存用户和权s限信息
        $testers = array(
            'studentId' => $studentId,
            'userName' => $row['name'],
            'role' => 'student'
        );
        $_SESSION['testers'] = $testers;
        header("location:index.php");
   
    } else {
        echo '登录失败,用户名或密码错误!   ';
        echo "<a href='login.php'>重新登录</a>";
        exit();
    }
}
?>