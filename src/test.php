<?php
if ($_GET['data'] != '') {
    $db = new mysqli("localhost", "root", "12345678", "travel");
    $id = substr($_GET['data'], 6);
    $sql = "delete from userimage where id= " . $id;
    $resultall = $db->query($sql);
}

echo "已经成功删除";
echo "<br>";
echo "<a href='photo.php'>返回我的照片</a>";