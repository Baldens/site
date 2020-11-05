<?php
    session_start();
    include_once 'connect.php';
    $name = filter_var(trim($_POST['family']), FILTER_SANITIZE_STRING);
    $login = filter_var(trim( $_POST['login']), FILTER_SANITIZE_STRING);
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $password = filter_var(trim($_POST['passwordconfirmation']), FILTER_SANITIZE_STRING);
    $passhash = md5($pass);
    if($pass !== $password || mb_strlen($pass)<2 || mb_strlen($pass)>60){
        $_SESSION['message'] = 'Недопустимая длина пароля или поля <Пароль> и <Подтвердите пароль> не схожи друг с другом!';
        header('Location: registration.php'); 
        exit();
    }
    elseif(mb_strlen($name)<2 || mb_strlen($name)>60){
        $_SESSION['message'] = 'Введите корректное имя!';
        header('Location: registration.php'); 
        exit();
    }
    elseif(mb_strlen($login)<2 || mb_strlen($login)>60){
        $_SESSION['message'] = 'Недопустимая длина логина';
        header('Location: registration.php'); 
        exit(); 
    }
    $mysql = new mysqli('localhost', 'mysql', 'mysql', 'databaseclient');   
    if($result = $mysql->query("SELECT * FROM `basdata` WHERE `login` = '$login' LIMIT 1")){
        $_SESSION['message'] = 'Данный пользователь с таким логином зарегестрирован!';
        header('Location: registration.php'); 
        exit(); 
    }
    $mysql->query("INSERT INTO `basdata` (`name`,`login`,`mail`,`password`) VALUES('$name','$login','$mail','$passhash')");
    $mysql->close();  
    header('Location: registration.php');
?>