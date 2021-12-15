<?php
require_once 'config/connect.php';
$song = mysqli_query($connect, "SELECT * FROM song");
$song = mysqli_fetch_all($song);

$album = mysqli_query($connect, "SELECT * FROM album");
$album = mysqli_fetch_all($album);

$performer = mysqli_query($connect, "SELECT * FROM performer");
$performer = mysqli_fetch_all($performer);

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Music library</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php
    foreach ($performer as $key ) {
        ?>
        <tr>
            <td><?= $key[0] ?></td>
            <td><?= $key[1] ?></td>
            <td><?= $key[2] ?></td>
        </tr>
        <?php
    }
    ?>
</table>

<h3>Додати альбом</h3>
<form class="" action="vendor/create.php" method="post">
    <p>Album name</p>
    <input type="text" name="AlbumName">
    <p>ID of performer</p>
    <input type="text" name="PerformerID">
    <button type="submit">Додати</button>
</form>
<br><br>
<table class="table">
    <tr>
        <th>Album ID</th>
        <th>Album Name</th>
        <th>Performer ID</th>
    </tr>
    <?php
    foreach ($album as $key ) {
        ?>
        <tr>
            <td><?= $key[0] ?></td>
            <td><?= $key[1] ?></td>
            <td><?= $key[2] ?></td>
        </tr>
        <?php
    }
    ?>
</table>
<h3>Додати пісню</h3>
<form class="" action="vendor/create.php" method="post">
    <p>Song name</p>
    <input type="text" name="SongName">
    <p>ID of album</p>
    <input type="text" name="AlbumID">
    <button type="submit">Додати</button>
</form>
<br><br>
<table class="table">
    <tr>
        <th>Song ID</th>
        <th>Song Name</th>
        <th>Album ID</th>
    </tr>
    <?php
    foreach ($song as $key ) {
        ?>
        <tr>
            <td><?= $key[0] ?></td>
            <td><?= $key[1] ?></td>
            <td><?= $key[2] ?></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>