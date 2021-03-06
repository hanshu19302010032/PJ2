<!DOCTYPE html>
<html>
<head>
    <title>首页</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<div id="wrapper">

    <header><h1>Image Gallery</h1></header>
    <nav>
        <?php
        session_start(); //声明变量
        $username = isset($_SESSION['user']) ? $_SESSION['user'] : ""; //判断session是否为空
        if (!empty($username)) { ?>
            <h1 style="color: whitesmoke">登录成功！</h1>
            <?php
            echo "<div style='color: whitesmoke'>$username;</div>" ?>
            <br/> <a href="login.php" style="color: whitesmoke">退出</a>
            <?php
        } else { //未登录，无权访问
            ?>
            <h1 style="color: whitesmoke">你无权访问！！！</h1>
            <?php
        } ?>
        <ul>
            <li id="mark"><a href="index.php">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="search.php">Search</a></li>

            <?php
            if (empty($username)) {
                echo "请先<a href=\"login.php\" style=\"color: whitesmoke\">登录</a>以访问更多！";
            } else {
                echo "<li><a>My Account</a>
                <ul>
                    <li><a href=\"upload.html\">
                            <img src=\"images/upload.png\" alt=\"upload\" width=\"20\" height=\"20\">
                            Upload</a>
                    </li>
                    <li><a href=\"photo.php\">
                            <img src=\"images/picture.png\" alt=\"pictures\" width=\"20\" height=\"20\">
                            My Photo</a>
                    </li>
                    <li><a href=\"favorite.php\">
                            <img src=\"images/favorite.png\" alt=\"favorite\" width=\"20\" height=\"20\">
                            My Favorite</a></li>
                    <li><a href=\"login.php\">
                            <img src=\"images/login.png\" alt=\"login\" width=\"20\" height=\"20\">
                            Log out</a></li>
                </ul>
            </li>";
            }
            ?>

        </ul>
    </nav>

    <main>
        <ul>
            <?php
            $random = rand(5, 15);
            for ($i = $random; $i < $random + 10; $i++) {
                $x = ($i <= 40) ? $i : ($i - 40);
                echo '<li><a href="introduction.php?data='.$x.'">
<img src="images/travel-images/square-medium/' . $x . '.jpg"  width="225" height="168">';
            }
            ?>
        </ul>
    </main>

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

</body>
</html>

