<?php

require_once('config.php');
function outputContent()
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from geocontents order by ContentID desc limit 0,5";
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            echo '<a href="browseaction.php">' . $row['ContentName'] . '</a>';
            echo '<br>';

        }
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function outputCountry()
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from geocountries order by CountryName limit 0,5";
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            echo '<a href="browseaction.php">' . $row['CountryName'] . '</a>';
            echo '<br>';
        }
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function outputCity()
{
    try {
        $pdo = new PDO(DBCONNSTRING, DBUSER, DBPASS);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from geocities order by GeoNameID desc limit 0,5";
        $result = $pdo->query($sql);
        while ($row = $result->fetch()) {
            echo '<a href="browseaction.php">' . $row['AsciiName'] . '</a>';
            echo '<br>';

        }
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no"
    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/browse.css">
    <script src="js/browse.js"></script>
</head>
<body>
<div id="wrapper">
    <header><h1>Image Gallery</h1></header>
    <div id="navigation">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li id="mark"><a href="browse.php">Browse</a></li>
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
    <nav>
        <form action="searchaction.php" method="post">
            <div id="search">
                <input type="text" placeholder="search by title" name="title" id="title" value=""/>
                <button><a>Search</a></button>
            </div>
        </form>

        <label><p>Filter by Content</p>
            <select id="select">
                <option value=""></option>
                <option value="scenery">scenery</option>
                <option value="city">city</option>
                <option value="people">people</option>
                <option value="animal">animal</option>
                <option value="building">building</option>
                <option value="wonder">wonder</option>
            </select>
        </label>
        <label><p>Filter by Country</p>
            <select id="select1" onchange="select()">
                <option value=""></option>
                <option value="China">China</option>
                <option value="Japan">Japan</option>
                <option value="Italy">Italy</option>
                <option value="America">America</option>
            </select>
        </label>
        <label><p>Filter by city</p>
            <select id="select2"></select>
        </label>
        <a href="browseaction2.php" style="color: whitesmoke;padding-left:20px;text-decoration: none">搜</a>
        <a href="browseaction.php" style="color: whitesmoke;text-decoration: none">索</a>
        <a href="searchaction.php" style="color: whitesmoke;text-decoration: none">!</a>
        <div id="hot">
            <div id="floatleft">
                <p>Hot Content</p>
                <?php
                outputContent();
                ?>
            </div>
            <div id="floatright">
                <p>Hot Country</p>
                <?php
                outputCountry();
                ?>
            </div>
            <div id="floatbottom">
                <p>Hot City</p>
                <?php
                outputCity();
                ?>
            </div>
        </div>
    </nav>


    <main>

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
