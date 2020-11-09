<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="result.php" method="POST">
        <?php 
            $imagesMass = ['files/01.gif','files/02.gif','files/03.gif','files/04.gif','files/05.gif'];
            foreach(glob("files/*.txt*") as $fil) {
                $txtMass[] = "files/" . basename($fil);
            }
            $random = rand(0,4);
            $openTxtMass = file_get_contents($txtMass[$random]);
            $openTxtMass = mb_convert_encoding($openTxtMass, 'UTF-8');           

            echo '<img src="' . $imagesMass[$random] . '">' . '<br>';
            
            $_SESSION['savePhoto'] = $imagesMass;
            $_SESSION['saveText'] = nl2br($openTxtMass);
            $_SESSION['countMass'] = $random;
            $_SESSION['countBannersVisit'];
        ?>
        <button type="submit">Зайти</button>
    </form>
    <form action="vivod.php" method="POST">
        <button type="submit">Показать результат баннеров.</button>
    </form>
</body>
</html>