<?php
if ($_GET['data'] != '') {
    $db = new mysqli("localhost", "root", "12345678", "travel");
    $id = substr($_GET['data'], 6);
    $sql = "delete from travelimagefavor where ID= " . $id;
    $resultall = $db->query($sql);
}

echo "已经成功删除";
echo "<br>";
echo "<a href='favorite.php'>返回我的收藏</a>";