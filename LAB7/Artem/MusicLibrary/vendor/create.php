<?php
require_once '../config/connect.php';
$SongName=$_POST['SongName'];
$AlbumID=$_POST['AlbumID'];
mysqli_query($connect,"INSERT INTO `song`(`SongName`, `AlbumID`) VALUES  ('$SongName','$AlbumID')");
header('Location: / ');

?>