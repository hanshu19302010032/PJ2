<?php
// $Id:$ //声明变量
function getRandomStr($len, $special = true)
{
    $chars = array(
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",
        "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",
        "w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",
        "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",
        "S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",
        "3", "4", "5", "6", "7", "8", "9"
    );

    if ($special) {
        $chars = array_merge($chars, array(
            "!", "@", "#", "$", "?", "|", "{", "/", ":", ";",
            "%", "^", "&", "*", "(", ")", "-", "_", "[", "]",
            "}", "<", ">", "~", "+", "=", ",", "."
        ));
    }

    $charsLen = count($chars) - 1;
    shuffle($chars);                            //打乱数组顺序
    $str = '';
    for ($i = 0; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $charsLen)];    //随机取出一位
    }
    return $str;
}

$salt = getRandomStr(7);
function passsalt($pass, $salt)
{
    $str1 = mb_substr($pass, 0, 2);
    $str2 = mb_substr($salt, 0, 2);
    $str3 = mb_substr($salt, -2);
    $str4 = mb_substr($pass, -5);
    $ret = md5($str1 . $str2 . $pass . $str3 . $str4);
    return $ret;
}

$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
$pass = passsalt($password, $salt);
$email = isset($_POST['email']) ? $_POST['email'] : "";
if ($password == $re_password) { //建立连接
    $conn = mysqli_connect("localhost", "root", "12345678", "travel"); //准备SQL语句,查询用户名
    $sql_select = "SELECT UserName FROM traveluser WHERE UserName = '$username'"; //执行SQL语句
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret); //判断用户名是否已存在
    if ($username == $row['UserName']) { //用户名已存在，显示提示信息
        header("Location:register.php?err=1");
    } else { //用户名不存在，插入数据 //准备SQL语句
        $sql_insert = "INSERT INTO traveluser(UserName,Email,Pass,salt) VALUES ('$username','$email','$pass','$salt')"; //执行SQL语句
        mysqli_query($conn, $sql_insert);
        header("Location:register.php?err=3");
    } //关闭数据库
    mysqli_close($conn);
} else {
    header("Location:register.php?err=2");
} ?>
