<?php
require_once ('DBConnection.php');
$selectByGenre = "SELECT *
FROM tour
JOIN country ON tour.Country = country.Id
JOIN type on tour.Type = type.Id
ORDER BY DESC;";
$selectByChannel = "SELECT `TVProgramm`.`Id`, `channel`.`Name`, `product`.`Name`, `type`.`TypeName`, `tvprogramm`.`Time` FROM `tvprogramm` JOIN `channel` on `ChannelId` = `channel`.`Id` JOIN `product` on `ProductId` = `product`.`Id` JOIN `type` on `product`.`Type` = `type`.`Id` order by `channel`.`Name` desc";

$sortBy = $_POST["SortBy"];
if($sortBy=="Genre"){
    $tvprogramm = mysqli_query($connect, $selectByGenre);
    $tvprogramm = mysqli_fetch_all($tvprogramm);
}
else{
    $tvprogramm = mysqli_query($connect, $selectByChannel);
    $tvprogramm = mysqli_fetch_all($tvprogramm);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Каталажка</title>
</head>
<body>
<div class="sort">
    <p>Наявні тури:</p>
</div>
<div class="table">
    <div class="container" style="width: 60%">
        <form action="display.php" method="post">
            <p>Сортувати по Жанрах/Каналах</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="rad1" name="SortBy" value="Genre" onclick="this.form.submit();">
                <label class="form-check-label" for="Genre">
                    По жанрах
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="rad2" name="SortBy" value="Channel" onclick="this.form.submit();">
                <label class="form-check-label" for="Channel">
                    По каналах
                </label>
            </div>
        </form>
        <table class="table">
            <tr>
                <th>Id</th>
                <th>Channel</th>
                <th>Product</th>
                <th>Genre</th>
                <th>Time</th>
            </tr>
            <?php
            foreach ($tvprogramm as $item) {
                ?>
                <tr>
                    <td><?= $item[0]?></td>
                    <td><?= $item[1]?></td>
                    <td><?= $item[2]?></td>
                    <td><?= $item[3]?></td>
                    <td><?= $item[4]?></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>
