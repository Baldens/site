<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/styleLogout.css" rel="stylesheet">
    <title>Авторизация</title>
</head>
<body>
    <form action="signin.php" method="POST" enctype="multipart/form-data">
        <a href="../../index.php"><p class="">Вернуться на главную страницу</p></a>
        <p>Логин: </p><input type="text" name="login"></br>
        <p>Пароль: </p><input type="password" name="password"></br>
        <button type="submit">Войти</button>
        <p><?php
            echo $_SESSION['messageauth'];
            if(isset($_SESSION['messageauth'])){
                $_SESSION['messageauth']='';
            }
        ?>
        </p>
    </form>
    <a href="registration.php"><p>Зарегистрироваться</p></a>

</body>
</html>