<?php
header("Content-Type:text/html;charset=utf-8");
//加载分页类
include "page.class.php";
$db = new mysqli("localhost", "root", "12345678", "travel");
//定义总数
$total = 0;
$title = isset($_POST['title']) ? $_POST['title'] : "";
$description = isset($_POST['description']) ? $_POST['description'] : "";
//判断是否连接成功
if (mysqli_connect_error()) {
    echo "连接失败";
    exit;
} else {
    $FF = $title == "" && $description == "";
    $TF = $title != "" && $description == "";
    $FT = $title == "" && $description != "";
    $TT = $title != "" && $description != "";
    if ($TF) {
        $sql = "select count(*) from travelimage where Title='$title'";
    } else if ($FT) {
        $sql = "select count(*) from travelimage where Description like '%$description%'";
    } else if ($TT) {
        $sql = "select count(*) from travelimage where Title='$title' and Description like '%$description%'";
    } else {
        $sql = "select count(*) from travelimage ";
    }

    $result = $db->query($sql);
    $sj = $result->fetch_row();
    $total = $sj[0];


    //造分页类的对象
    $page = new Page($total, 5, "", true);
    if ($TF) {
        $sqlshow = "select * from travelimage where Title='$title'" . $page->limit;
    } else if ($FT) {
        $sqlshow = "select * from travelimage where Description like '%$description%'" . $page->limit;
    } else if ($TT) {
        $sqlshow = "select * from travelimage where Title='$title' and Description like '%$description%'" . $page->limit;
    } else {
        $sqlshow = "select * from travelimage " . $page->limit;
    }
    $resultall = $db->query($sqlshow);

    echo "<table width='100%' border='1'>
            <tr>
                <td>photo</td>
                <td>title</td>
                <td>description</td>  
            </tr>
        ";


    while ($row = $resultall->fetch_row()) {
        echo "<tr>
                        <td><a href='introduction.php?data=".$row[0]."'>
                        <img src=\"images/travel-images/square-medium/" . $row[0] . ".jpg\"  width=\"200\" height=\"100\"></td>
                        <td>{$row[1]}</td>
                        <td>{$row[2]}</td>
                    </tr>";
    }

    echo "<tr><td colspan='4'>" . $page->fpage() . "</td></tr>";

    echo "</table>";

}
?>
<a href="browse.php" style="text-decoration: none">浏览页</a>
<a href="search.php" style="text-decoration: none">搜索页</a>