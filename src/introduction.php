<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <title>Image Gallery</title>
    <link rel="stylesheet" href="css/introduction.css">
    <script src="js/introduction.js"></script>
</head>
<body>
<?php
$db = new mysqli("localhost", "root", "12345678", "travel");
if (mysqli_connect_error()) {
    echo "连接失败";
    exit;
} else {
    $sql = "select * from travelimage where ImageID= " . $_GET['data'];
    $result = $db->query($sql);
    while ($row = $result->fetch_row()) {
        echo "<div id=\"wrapper\">
    <header><h1>Image Gallery</h1></header>
    <div id=\"navigation\">
        <ul>
            <li><a href=\"index.php\">Home</a></li>
            <li><a href=\"browse.php\">Browse</a></li>
            <li><a href=\"search.php\">Search</a></li>
            <li><a>My Account</a>
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
            </li>
        </ul>
    </div>

    <main>
        <img src=\"images/travel-images/square-medium/" . $_GET['data'] . ".jpg\"  width=\"320\" height=\"260\">
        <div>
            <a href='collect.php?data=" . $_GET['data'] . "'><button>Collect</button></a>
            <h2>" . $row[1] . "</h2>
            <table border=\"1\">
                <tr>
                    <th>Collected Times</th>
                    <td>" . $row[12] . "</td>
                </tr>
                <tr class=\"grey\">
                    <th>Content</th>
                    <td>" . $row[9] . "</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>" . $row[6] . "</td>
                </tr>
                <tr class=\"grey\">
                    <th>City</th>
                    <td>" . $row[5] . "</td>
                </tr>
                <tr>
                    <th>Cameraman</th>
                    <td>5477</td>
                </tr>
            </table>

        </div>
        <div class=\"intro\">
            <p>" . $row[2] . "</p>
        </div>
    </main>
    <footer>
        <ul>
            <li><img src=\"images/footer1phone.png\" width=\"20\" height=\"20\">
                17705826551
            </li>
            <li><img src=\"images/footer2qq.png\" width=\"20\" height=\"20\">
                1726778203
            </li>
            <li><img src=\"images/footer3wechat.png\" width=\"20\" height=\"20\">
                17705826551
            </li>
            <li><img src=\"images/footer4address.png\" width=\"20\" height=\"20\">
                universe-earth
            </li>
            <img src=\"images/QR%20code.png\" width=\"40\" height=\"40\" id=\"footer\">
            <p>Copyright &copy; 2020 HanShu</p>
        </ul>
        <div>
            <a href=\"javascript:location.reload();\">
                <img src=\"images/F5.png\" width=\"20\" height=\"20\">
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href=\"#top\" target=\"_self\">
                <img src=\"images/backToTop.png\" width=\"20\" height=\"20\">
            </a>
        </div>
    </footer>
</div>

</body>
</html>";
    }


}

?>