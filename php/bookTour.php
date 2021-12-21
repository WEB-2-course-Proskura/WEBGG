<?php
require_once ('DBConnection.php');
require_once ('header.php');
$countries = "SELECT Id, CountryName FROM country;";
$countries = mysqli_query($connect, $countries);
$selectByCountry = "SELECT
       tour.Id,
    country.CountryName,
    tour.Description,
    TYPE.TypeName,
    tour.Price
FROM
    tour
JOIN country ON tour.Country = country.Id
JOIN TYPE ON tour.Type = TYPE.Id
ORDER BY CountryName";
$selectByType = "SELECT
    tour.Id,
    country.CountryName,
    tour.Description,
    TYPE.TypeName,
    tour.Price
FROM
    tour
JOIN country ON tour.Country = country.Id
JOIN TYPE ON tour.Type = TYPE.Id
ORDER BY TypeName";

$sortBy = $_POST["SortBy"];
if($sortBy=="Country"){
    $tours = mysqli_query($connect, $selectByCountry);
}
else{
    $tours = mysqli_query($connect, $selectByType);
}
?>

<body>
<div class="sort">
    <p id="Login"></p>
</div>
<div class="table">
    <p>Наявні тури:</p>
    <div class="container" style="width: 60%">
        <form action="bookTour.php" method="post" id="form1">
            <p>Сортувати по Країнах/Типу</p>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="rad1" name="SortBy" value="Country" onclick="this.form.submit();">
                <label class="form-check-label" for="Country">
                    По країнах
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="rad2" name="SortBy" value="Type" onclick="this.form.submit();">
                <label class="form-check-label" for="Type">
                    По типу
                </label>
            </div>
        </form>
        <table class="table">
            <tr>
                <th>Country</th>
                <th>Description</th>
                <th>Type</th>
                <th>Price</th>
                <th>Choose!</th>
            </tr>
            <?php
            while($object = mysqli_fetch_object($tours)) {

                echo"<form action='ConfirmDates.php' method='post'>
                    <tr>
                        <td>$object->CountryName</td>
                        <td>$object->Description</td>
                        <td>$object->TypeName</td>
                        <td>$object->Price</td>
                        <td><button type='submit' class='btn btn-success' name='BuyButton' value='$object->Id'>Купити</button></td>
                    </tr>
                </form>";
            }
            ?>

        </table>
    </div>
</div>
<div class="add"><a href="insertDB.php">Додати тури</a></div>
<script>
    function LoginShow(){
        $.ajax({
            url: "showLogin.php",
            cache: false,
            success: function (html){
                $('#Login').html(html);
            }
        })
    }
    setInterval('LoginShow()',1000);
</script>
</body>
</html>
