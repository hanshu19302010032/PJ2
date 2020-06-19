<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/search.css">
    <script src="js/search.js"></script>
</head>
<body>
<div id="wrapper">
    <header><h1>Image Gallery</h1></header>
    <div id="navigation">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li id="mark"><a href="search.php">Search</a></li>
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
            <div id="searchByTitle">
                <input type="text" placeholder="filter by title" name="title" id="title" value=""/>
                <button onclick="controlDIV()">Search</button>
            </div>
            <div id="searchByTitle">
                <input type="text" placeholder="filter by despription" name="description" id="description" value=""/>
                <button onclick="controlDIV()">Search</button>
            </div>
        </form>
    </nav>


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