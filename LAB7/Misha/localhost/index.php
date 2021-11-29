<?php
    $title = "Main";
    require("header.php");
?>
<div class="container">
    <h2>Введи свои данные:</h2>
    <form action="display.php" method="POST">
        <p>Введите имя: <input type="text" name="firstname" class="form-control" autocomplete="off"/></p>
        <p>Введите фамилию: <input type="text" name="lastname" class="form-control" autocomplete="off"/></p>
        <input type="submit" value="Отправить" class="btn btn-success">
    </form>
</div>

<?php
    require ("footer.php");
?>

