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
            <input type="text" name="count">
            <button type="submit">Готово</button><br><br><br>
            <?php
                $countStr = $_POST['count'];
                echo "<span class='countses'>$countStr</span><br><br>";
                for ($i=0; $i < $countStr; $i++) { 
                    echo "<input type = \"text\" name = \"valueA$i\" class = \"valueA$i\" value=\"$i\">
                    <input type = \"text\" name = \"valueB$i\" class = \"valueB$i\" value=\"" . ($i + 0.5) . "\"><br>";
                }

                echo "<br><button type='button' class='ok'>Реализовать</button>";
            ?>
            <p class="vivod"></p>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>