<?php
    session_start();
    $login = filter_var(trim( $_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    $passhash = md5($pass);
    $mysql = new mysqli('localhost', 'mysql', 'mysql', 'databaseclient');   
    $result = $mysql->query("SELECT * FROM `basdata` WHERE `login` = '$login' AND `password` = '$passhash'");
    $user = $result->fetch_assoc();
    if(count($user)==0){
        $_SESSION['messageauth'] = 'Такой пользователь не найден';
        header('Location: logout.php'); 
        exit();
    }
    print_r($user);
    exit();
    $mysql->close();
    $_SESSION['messageauth'] = "Авторизован ты сукин сын!";
    header('Location: logout.php');
?>