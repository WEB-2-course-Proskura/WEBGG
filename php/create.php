<?php
require_once 'DBConnection.php';
$connect = mysqli_connect('localhost','root','','TourAgency');
//print_r($_POST);

$title = $_POST['Country'];
$price = $_POST['price'];
$description = $_POST['description'];
$type = $_POST['Type'];
$str = "INSERT INTO `Tour` (`Country`, `Description`, `Type`, `Price`) VALUES ('$title', '$description', '$type', '$price')";
mysqli_query($connect, $str);
$fd = fopen("logs.txt", 'w') or die("не удалось создать файл");
fwrite($fd, $str);
fclose($fd);
header("Location: ../");