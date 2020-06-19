<?php
if (isset($_POST['submit'])) {
    $description = isset($_POST['description']) ? $_POST['description'] : "";
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $content = isset($_POST['content']) ? $_POST['content'] : "";
    $country = isset($_POST['country']) ? $_POST['country'] : "";
    $city = isset($_POST['city']) ? $_POST['city'] : "";
    $cameraman = isset($_POST['cameraman']) ? $_POST['cameraman'] : "";


    $dsn = 'mysql:dbname=travel;host=localhost';
    $pdo = new PDO($dsn, 'root', '12345678');
    $sql="UPDATE userimage SET title='"."$title"."',description='"."$description"."',
    content='"."$content"."',city='"."$city"."',country='"."$country"."',cameraman='"."$cameraman"."
' WHERE id=".$_GET['data'];

    $result = $pdo->query($sql);
    if ($result) {
        echo "已经更新完毕！";
    } else {
        echo "请求失败,请重试";
    }
}
echo "<a href='photo.php'>回到我的照片</a>";
