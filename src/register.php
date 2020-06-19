<!DOCTYPE html>
<html>
<head><title>注册</title>
    <meta name="content-type" ; charset="UTF-8">
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<div class="content" align="center"> <!--头部-->
    <div class="header"><h1>注册</h1></div> <!--中部-->
    <div class="middle">
        <form action="registeraction.php" method="post">
            <table border="0">
                <tr>
                    <td>用户名：</td>
                    <td><input type="text" id="id_name" name="username" required="required"></td>
                </tr>
                <tr>
                    <td>密 码：</td>
                    <td><input type="password" id="password" name="password"
                               required="required"></td>
                </tr>
                <tr>
                    <td>重复密码：</td>
                    <td><input type="password" id="re_password"
                               name="re_password" required="required"></td>
                </tr>
                <tr>
                    <td>Email：</td>
                    <td><input type="email" id="email" name="email" required="required"></td>
                </tr>

                <tr>
                    <td colspan="2" align="center" style="color:red;font-size:10px;"> <!--提示信息-->
                        <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch ($err) {
                            case 1:
                                echo "用户名已存在！";
                                break;

                            case 2:
                                echo "密码与重复密码不一致！";
                                break;

                            case 3:
                                echo "注册成功！";
                                break;
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" id="register" name="register" value="注册">
                        <input type="reset" id="reset" name="reset" value="重置"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        如果已有账号，快去<a href="login.php">登录</a>吧！
                    </td>
                </tr>
            </table>
        </form>
    </div>
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


