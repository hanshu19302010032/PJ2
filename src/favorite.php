<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/favorite.css">
    <script src="js/favorite.js"></script>
</head>
<body>
<div id="wrapper">
    <header><h1>Image Gallery</h1></header>
    <div id="navigation">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a>My Account</a>
                <ul>
                    <li><a href="upload.html">
                            <img src="images/upload.png" alt="upload" width="20" height="20">
                            Upload</a>
                    </li>
                    <li><a href="photo.php">
                            <img src="images/picture.png" alt="pictures" width="20" height="20">
                            My Photo</a>
                    </li>
                    <li class="mark"><a href="favorite.php">
                            <img src="images/favorite.png" alt="favorite" width="20" height="20">
                            My Favorite</a></li>
                    <li><a href="login.php">
                            <img src="images/login.png" alt="login" width="20" height="20">
                            Log out</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <main>
        <?php
        header("Content-Type:text/html;charset=utf-8");
        //加载分页类
        include "page.class.php";
        $db = new mysqli("localhost", "root", "12345678", "travel");
        //定义总数
        $total = 0;

        //判断是否连接成功
        if (mysqli_connect_error()) {
            echo "连接失败";
            exit;
        } else {

            $sql = "select count(*) from travelimagefavor";
            $result = $db->query($sql);
            $sj = $result->fetch_row();
            $total = $sj[0];
//            echo $total;
//            $limit = min($total, 5);

            //造分页类的对象
            $page = new Page($total, 5, "", true);
            $sqlshow = "select * from travelimage join travelimagefavor on travelimage.ImageID=travelimagefavor.ID " . $page->limit;
            $resultall = $db->query($sqlshow);

            echo "<table width='100%' border='1'>
            <tr>
                <td>photo</td>
                <td>title</td>
                <td>description</td> 
                <td>操作</td>
            </tr>
        ";

            while ($row = $resultall->fetch_row()) {
                echo "<tr>
                        <td><a href='introduction.php?data=".$row[0]."'>
                         <img src=\"images/travel-images/square-medium/" . $row[0] . ".jpg\"  width=\"200\" height=\"100\"></a></td>
                        <td>{$row[1]}</td>
                        <td>{$row[2]}</td>
                        <td>
                            <button id='delete" . $row[0] . "' onclick='Delete(id)'>delete</button>
                        </td>
                    </tr>";
            }



            echo "<tr><td colspan='4'>" . $page->fpage() . "</td></tr>";

            echo "</table>";

        }
        ?>

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
            <img src="images/QR%20code.png" width="40" height="40" id="footer">
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