<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>golovanov.</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12 index">
                <h1>Регистрация</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form method='POST' action='/registration.php'>
                    <div class="row from_reg"><input class="from" type="text" name="login" placeholder="Login"></div>
                    <div class="row from_reg"><input class="from" type="password" name="password" placeholder="Password"></div>
                    <button type='submit' class="btn_reg" name="submit">Продолжить</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html> 

<?php
require_once('./db.php');
$link = mysqli_connect('127.0.0.1', 'root', 'qwe', 'first_db');

if (isset($_COOKIE['User'])) 
{
    header("Location: login.php");
}

if (isset($_POST['submit'])) 
{
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (!$username || !$password) die ('Пожалуйста введите все значения!');

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if(!mysqli_query($link, $sql)) 
    {
        echo "Не удалось добавить пользователя";
    }
}
?>