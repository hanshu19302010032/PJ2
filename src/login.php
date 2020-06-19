<!DOCTYPE html>
<html>
<head>
    <title>登录</title>
    <meta name="content-type" ; charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="content" align="center">
    <div class="header"><h1>登录</h1></div>
    <div class="middle">
        <form id="loginform" action="loginaction.php" method="post">
            <table border="0">
                <tr>
                    <td>用户名：</td>
                    <td><input type="text" id="name" name="username"
                               required="required" value="<?php
                        echo isset($_COOKIE[""]) ? $_COOKIE[""] : ""; ?>"></td>
                </tr>
                <tr>
                    <td>密 码：</td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="checkbox" name="remember"><small>记住我</td>
                </tr>
                <tr>
                    <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息--> <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch ($err) {
                            case 1:
                                echo "用户名或密码错误！";
                                break;

                            case 2:
                                echo "用户名或密码不能为空！";
                                break;
                        } ?> </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" id="login" name="login" value="登录"> <input type="reset" id="reset"
                                                                                        name="reset" value="重置"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"> 还没有账号，快去<a href="register.php">注册</a>吧</td>
                </tr>
            </table>
        </form>
        <footer>

            <ul>
                <li><img src="images/footer1phone.png" width="20" height="20">
                    17705826551
                </li>
                <li><img src="images/footer2qq.png" width="20" height="20">
                    1726778203
                </li>
                <li><img src="images/footer3wechat.png" width="20" height="20">
                    17705826551
                </li>
                <li><img src="images/footer4address.png" width="20" height="20">
                    universe-earth
                </li>
                <img src="images/QR%20code.png" width="40" height="40" id="floatright">
                <p>Copyright &copy; 2020 HanShu</p>
            </ul>
            <div>
                <a href="javascript:location.reload();">
                    <img src="images/F5.png" width="20" height="20">
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#top" target="_self">
                    <img src="images/backToTop.png" width="20" height="20">
                </a>
            </div>
        </footer>
    </div>
</body>
</html>

