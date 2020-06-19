<?php
$id = $_GET['data'];
$dsn = 'mysql:dbname=travel;host=localhost';
$pdo = new PDO($dsn, 'root', '12345678');
//$sql = "UPDATE travelimage SET collectedtimes=collectedtimes+1 WHERE ImageID=" . $id;
//
//$result = $pdo->query($sql);
//if ($result) {
//    echo "收藏次数+1！";
//} else {
//    echo "请求失败,请重试";
//}


$db = new mysqli("localhost", "root", "12345678", "travel");
if (mysqli_connect_error()) {
    echo "连接失败";
    exit;
} else {
    $sql = "UPDATE travelimage SET collectedtimes=collectedtimes+1 WHERE ImageID=" . $id;
    $pdo->query($sql);
    echo "收藏次数+1！";
    echo "<br>";
    $sql2 = "select * from travelimagefavor where ID =" . $id;
    $result2 = $db->query($sql2);

    if (!($row = $result2->fetch_row())) {
        echo "还没有收藏过！";
        $sql3 = "INSERT INTO travelimagefavor (ID) VALUES ($id)";
        $result3 = $pdo->query($sql3);
        if ($result3) {
            echo "已收藏！";
            echo "<br>";
        } else {
            echo "请求失败,请重试";
            echo "<br>";
        }

    } else {
        echo "您已经收藏过了！";
        echo "<br>";
    }

}


echo "<a href='favorite.php'>返回我的收藏</a>";