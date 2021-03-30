<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="jquery-3.6.0.min.js"></script>
</head>
<body>
    <div>
        <form method="POST">
            <p>Введите мощность алфавита: </p>
            <input type="text" name="count" value="3">
            <p>Введите длина слова: </p>
            <input type="text" name="count2" value="4">
            <button type="submit">Готово</button><br><br><br>
            <?php
                $countStr1 = $_POST['count'];
                $countStr2 = $_POST['count2'];
                echo "<span class='countses'>$countStr1 $countStr2</span><br><br>";
                for ($i=0; $i < $countStr1; $i++) { 
                    echo "<input type = \"text\" name = \"valueA$i\" class = \"valueA$i\" value=\"$i\">
                    <input type = \"text\" name = \"valueB$i\" class = \"valueB$i\" value=\"" . (0.5) . "\"><br>";
                }

                echo "<br><button type='button' class='ok'>Реализовать</button>";
            ?>
            <p class="vivod"></p>
            <p class="vivods"></p>
        </form>
    </div>
    <script src="script2.js"></script>
</body>
</html>