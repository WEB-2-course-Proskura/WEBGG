<?php
require_once 'configs/DBconnect.php';
require_once ('header.php');
require_once ('footer.php');
$title = "Display";
$name = $_POST["firstname"];
$surname = $_POST["lastname"];
$selectByGenre = "SELECT `TVProgramm`.`Id`, `channel`.`Name`, `product`.`Name`, `type`.`TypeName`, `tvprogramm`.`Time` FROM `tvprogramm` JOIN `channel` on `ChannelId` = `channel`.`Id` JOIN `product` on `ProductId` = `product`.`Id` JOIN `type` on `product`.`Type` = `type`.`Id` order by `type`.`TypeName` desc";
$selectByChannel = "SELECT `TVProgramm`.`Id`, `channel`.`Name`, `product`.`Name`, `type`.`TypeName`, `tvprogramm`.`Time` FROM `tvprogramm` JOIN `channel` on `ChannelId` = `channel`.`Id` JOIN `product` on `ProductId` = `product`.`Id` JOIN `type` on `product`.`Type` = `type`.`Id` order by `channel`.`Name` desc";
?>
<?php
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
<script>
    function SelectRadio(rad){
        let selected_radio = document.getElementById(rad).value;
        if(rad == 'rad2'){
            window.location.href = 'display.php';
            document.getElementById(rad).checked = 'checked';
        }
        else{
            window.location.href = 'display.php';
            document.getElementById(rad).checked = 'checked';
        }
    }
</script>

<div class="container" style="width: 60%">
    <h3 style="text-align: center"><?php echo 'Your name is '. $name . ' ' . $surname;?></h3>
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

