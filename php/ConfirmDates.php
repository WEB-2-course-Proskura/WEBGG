<?php
require_once ('DBConnection.php');
require_once ("header.php");
$data=$_POST;
if(!isset($_SESSION['logged_user'])) {
    header('Location:logIn.php');
}
if(isset($data['ConfirmButton']))
{
    $error = false;
    if (is_null($data['Date1']))
    {
        echo "<script>alert('Введіть дату відправлення');</script>";
        $error = true;
    }
    if (is_null($data['Date2']))
    {
        echo "<script>alert('Веедіть дату прибуття назад');</script>";
        $error = true;
    }
    if(!$error)
    {
        $TourId = $_POST['ConfirmButton'];
        $DateFrom = $_POST['Date1'];
        $DateTo = $_POST['Date2'];
        $userId = $_SESSION['logged_user'];
        $userId = mysqli_fetch_object(mysqli_query($connect, "(SELECT Id FROM `User` WHERE `Login`= '$userId')"));
        $userId = intval($userId->Id);
        $str = "INSERT INTO `Bougthtour` (`TourId`,`UserId`, `DateFrom`, `DateTo`) VALUES ('$TourId','$userId','$DateFrom','$DateTo')";
        $kek = mysqli_query($connect, $str);
        if(!$kek){
            echo "<p style='color: red'><strong>Ви не придбали тур!</strong></p>";

        }
        else{
            echo "<p style='color: green'><strong>Ви успішно придбали тур!</strong></p>";
            $fd = fopen("logs.txt", 'w') or die("не удалось создать файл");
            fputs($fd, $str);
            fclose($fd);
        }

    }
}
$tour = $_POST['BuyButton'];
$sql = "SELECT
    country.CountryName,
    tour.Description,
    TYPE.TypeName,
    tour.Price
FROM
    tour
JOIN country ON tour.Country = country.Id
JOIN TYPE ON tour.Type = TYPE.Id
WHERE tour.Id = '$tour'";
$sql = mysqli_query($connect, $sql);
?>
<script>
    $( function() {
        $( '#datepicker' ).datepicker({ dateFormat: 'yy-mm-dd' });
        $( '#datepicker2' ).datepicker({ dateFormat: 'yy-mm-dd' });
    } );
</script>
<p align="center">Обраний тур:</p>
<div class="container" style="width: 60%">
<table class="table">
    <tr>
        <th>Country</th>
        <th>Description</th>
        <th>Type</th>
        <th>Price</th>
    </tr>
<?php
while($object = mysqli_fetch_object($sql)) {
    echo"
                    <tr>
                        <td>$object->CountryName</td>
                        <td>$object->Description</td>
                        <td>$object->TypeName</td>
                        <td>$object->Price</td>
                    </tr>";
}
   ?>
</table>
    <?php
        echo "<p align='center'>Оберіть дату</p>
<form action='ConfirmDates.php' method='post'>
<p align='center'>DateFrom: <input type='text' name='Date1' id='datepicker' autocomplete='off'></p>
<p align='center'>DateTo: <input type='text' name='Date2' id='datepicker2' autocomplete='off'></p>
<div style='text-align: center'><button type='submit' class='btn btn-success'  name='ConfirmButton' value='$tour'>Купити</button></div>
</form>"
    ?>

</div>
