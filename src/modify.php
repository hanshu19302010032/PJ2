<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>log in</title>
    <link rel="stylesheet" href="css/upload.css">
    <script src="js/browse.js"></script>
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
                    <li class="mark"><a href="upload.html">
                            <img src="images/upload.png" alt="upload" width="20" height="20">
                            Upload</a>
                    </li>
                    <li><a href="photo.php">
                            <img src="images/picture.png" alt="pictures" width="20" height="20">
                            My Photo</a>
                    </li>
                    <li><a href="favorite.php">
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
        if ($_GET['data'] != '') {
            $db = new mysqli("localhost", "root", "12345678", "travel");
            $id = substr($_GET['data'], 6);
            $sql = "select * from userimage where id= " . $id;
            $resultall = $db->query($sql);
            while ($row = $resultall->fetch_row()) {
                echo "<form method=\"post\" action=\"modifyaction.php?data=".$id."\" enctype=\"multipart/form-data\">

            标题：
            <input type=\"text\" name=\"title\" size=\"40\" required=\"required\" value='$row[5]'>
            <br>
            描述:
            <input type=\"text\" name=\"description\" size=\"40\" value='$row[6]'>
            <br>
            主题：
            <select name=\"content\" required=\"required\" id='selectcontent'>
                <option value=\"\"></option>
                <option value=\"scenery\">scenery</option>
                <option value=\"city\">city</option>
                <option value=\"animal\">animal</option>
                <option value=\"people\">people</option>
                <option value=\"building\">building</option>
                <option value=\"wonder\">wonder</option>
                <option value=\"other\">other</option>
            </select>
            国家：
            <select id=\"select1\" name=\"country\" onchange=\"select()\" id='selectcountry'>
                <option value=\"\"></option>
                <option value=\"China\">China</option>
                <option value=\"Japan\">Japan</option>
                <option value=\"Italy\">Italy</option>
                <option value=\"America\">America</option>
            </select>
            城市：
            <select id=\"select2\" name=\"city\" ></select>
            <br>
            摄影师：
            <input type=\"text\" name=\"cameraman\" size=\"40\" required=\"required\" value='$row[9]'>
            <br>

        <input type=\"submit\" name=\"submit\" value=\"modify\">
        </form>
        <script>
                document.getElementById('selectcontent')[0].value='$row[10]';
                document.getElementById('selectcountry')[0].value='$row[7]';
                document.getElementById('select2')[0].value='$row[8]';
            </script>";
            }
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
