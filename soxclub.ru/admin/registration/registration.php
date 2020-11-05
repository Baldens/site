<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../style/styleRegistration.css" rel="stylesheet">
    <title>Регистрация</title>
</head>
<body>
    <form action="signup.php" method="POST">
        <a href="../../index.php"><p class="">Вернуться на главную страницу</p></a>
        <p>Имя Фамилия: </p><input type="text" name="family"></br>
        <p>Логин: </p><input type="text" name="login"></br>
        <p>Email: </p><input type="email" name="mail"></br>
        <p>Пароль: </p><input type="password" name="password"></br>
        <p>Подтвердите пароль: </p><input type="password" name="passwordconfirmation"></br>
        <button type="submit">Отправить форму</button>
        <p><?php
                echo $_SESSION['message'];
                if(isset($_SESSION['message'])){
                    $_SESSION['message'] = '';
                }

         ?></p>
    </form>
    <a href="logout.php "><p>Уже есть аккаунт</p></a>
</body>
</html>