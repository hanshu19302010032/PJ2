<?php
// $Id:$ //声明变量
function passsalt($pass,$salt){
    $str1 = mb_substr($pass,0,2);
    $str2 = mb_substr($salt,0,2);
    $str3 = mb_substr($salt,-2);
    $str4 = mb_substr($pass,-5);
    $ret = md5($str1.$str2.$pass.$str3.$str4);
    return $ret;
}
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$remember = isset($_POST['remember']) ? $_POST['remember'] : ""; //判断用户名和密码是否为空

if (!empty($username) && !empty($password)) { //建立连接
    $conn = mysqli_connect('localhost', 'root', '12345678', 'travel'); //准备SQL语句
    $sql_select = "SELECT * FROM traveluser WHERE UserName = '$username'  "; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断用户名或密码是否正确
    $pass1=passsalt($password,$row['salt']);
    if ($username == $row['UserName'] && $pass1 == $row['Pass'])
    { //选中“记住我”
        if ($remember == "on")
        { //创建cookie
            setcookie("", $username, time() + 7 * 24 * 3600);
        } //开启session
        session_start(); //创建session
        $_SESSION['user'] = $username; //写入日志
        $ip = $_SERVER['REMOTE_ADDR'];
        $date = date('Y-m-d H:m:s');
        $info = sprintf("当前访问用户：%s,IP地址：%s,时间：%s /n", $username, $ip, $date);
        $sql_logs = "INSERT INTO logs(username,ip,date) VALUES('$username','$ip','$date')";
        $f = fopen('./logs/' . date('Ymd') . '.log', 'a+');
        fwrite($f, $info);
        fclose($f);
        header("Location:index.php");
        mysqli_close($conn);
    }
    else
    {
        //用户名或密码错误，赋值err为1
        header("Location:login.php?err=1");
    }
} else { //用户名或密码为空，赋值err为2
    header("Location:login.php?err=2");
} ?>

