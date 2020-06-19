<?php
if (isset($_POST['submit'])) {
    $description =isset($_POST['description']) ? $_POST['description'] : "";
    $title = isset($_POST['title']) ? $_POST['title'] : "";
    $content=isset($_POST['content']) ? $_POST['content'] : "";
    $country=isset($_POST['country']) ? $_POST['country'] : "";
    $city=isset($_POST['city']) ? $_POST['city'] : "";
    $cameraman=isset($_POST['cameraman']) ? $_POST['cameraman'] : "";

    $form_data_name = $_FILES['form_data']['name'];
    $form_data_size = $_FILES['form_data']['size'];
    $form_data_type = $_FILES['form_data']['type'];
    $form_data = $_FILES['form_data']['tmp_name'];
    $title = isset($_POST['title']) ? $_POST['title'] : "";

    $content=isset($_POST['content']) ? $_POST['content'] : "";

    $dsn = 'mysql:dbname=travel;host=localhost';
    $pdo = new PDO($dsn, 'root', '12345678');
    $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
    //echo "mysqlPicture=".$data;

    $result = $pdo->query("INSERT INTO userimage (description,bin_data,filename,filesize,filetype,title,content,country,city,cameraman)
                  VALUES ('$description','$data','$form_data_name','$form_data_size','$form_data_type','$title','$content','$country','$city','$cameraman')");
    if ($result) {
        echo "图片已存储到数据库";
    } else {
        echo "请求失败,请重试";
    }
}
echo "<a href='upload.html'>回去继续上传！</a>";
