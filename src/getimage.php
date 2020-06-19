<?php

$id = $_GET['id'];
$dsn ='mysql:dbname=travel;host=localhost';
$pdo = new PDO($dsn,'root','12345678');
$query = "select bin_data,filetype from userimage where id=".$id;
$result = $pdo->query($query);
$result = $result->fetchAll(2);
//    var_dump($result);
$data = $result[0]['bin_data'];
$type = $result[0]['filetype'];
Header( "Content-type: $type");
echo $data;

?>

