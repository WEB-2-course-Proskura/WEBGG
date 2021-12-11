<?php
require_once ('DBConnection.php');
require_once ('header.php');
$connect = mysqli_connect('localhost','root','','TourAgency');
$data = $_POST;
if (isset($data['signUp']))
{
    $error = false;
    if (trim($data['login'])=='')
    {
        echo "<script>alert('Введіть логін');</script>";
        $error = true;
    }
    if (trim($data['password'])=='')
    {
        echo "<script>alert('Введіть пароль');</script>";
        $error = true;
    }
    if(!$error)
    {
        $lg = $data['login'];
        $ps = password_hash($data['password'], PASSWORD_DEFAULT);
        $str = "INSERT INTO  `User` (`Login`,`Password`,`Status`) VALUES ('$lg', '$ps', 1)";
        $kek = mysqli_query($connect, $str);
        if($kek) {
            echo "<p style='color: green'><strong>Ви зареєструвалися!</strong></p>";
            $fd = fopen("logs.txt", 'w') or die("не удалось создать файл");
            fwrite($fd, $str);
            fclose($fd);
        }
        else
            echo "<p style='color: red'><strong>Ви не зареєструвалися!</strong></p>";
    }
}

?>
<div class="container">
    <form action="signUp.php" method="post">
        <p><strong>Ваш логін:</strong></p><br>
        <input type="text" name="login" value="<?php echo @$data['login']?>"><br>
        <p><strong>Ваш пароль:</strong></p><br>
        <input type="password" name="password" value="<?php echo @$data['password']?>"><br>
        <p><button type='submit' class='btn btn-success' name="signUp" value="1">Зареєструватися</button></p>
    </form>
</div>
