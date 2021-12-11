<?php
require_once ('DBConnection.php');
require_once ('header.php');
$countries = "SELECT Id, CountryName FROM country;";
$countries = mysqli_query($connect, $countries);

?>

<form action="create.php" method="post">
    <p>Назва туру</p>
    <?php
    echo "<select name = 'Country'>";
    while($object = mysqli_fetch_object($countries)){
        echo "<option value = '$object->Id' > $object->CountryName </option>";}
    echo "</select>"; ?>
    <p>Опис</p>
    <textarea name="description"></textarea>
    <p>Тип</p>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="rad1" name="Type" value="2">
        <label class="form-check-label" for="Genre">
            Курорт
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" id="rad2" name="Type" value="1">
        <label class="form-check-label" for="Channel">
            Автобусний тур
        </label>
    </div>
    <p>Ціна</p>
    <input type="number" name="price">
    <button type="submit" class="btn btn-success">Добавить</button>
</form>
