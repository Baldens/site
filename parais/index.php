<!DOCTYPE HTML>
<html>
<head>
<meta charset=utf-8">
<title>lab1</title>
<link rel = "stylesheet" href = "style.css">
</head>
<body>
    <a href="ind2.php">2 задание</a>
    <a href="ind3.php">3 задание</a>
    <div>
        <form method = "POST">
            <h2><p>Вычисление энтропии</p></h2>
            <p>Введите количество пар:</p> <input type = "text" name = "quantity"><br>
            <input type = "submit" name = "getresult"><br><br><br> <center>
        <?php
        $N = $_POST['quantity'];
        $cr1 = $_POST['valueA0'];
        $mass1 = array();
        $mass2 = array();
        if ($N != "") {
            $file = fopen("counter.txt", "w");
            fwrite($file, "$N");
            fclose($file);
            for ($i=0; $i < $N; $i++) {
                echo "<input type = \"text\" name = \"valueA$i\">
                <input type = \"text\" name = \"valueB$i\"><br>";
            }
        }
        if ($cr1 != "") {
            $file1 = fopen("counter.txt", "r");
            $count = fgets($file1);
            for ($i=0; $i < $count; $i++) {
                $k2 = $_POST["valueA$i"];
                $k3 = $_POST["valueB$i"];
                array_push($mass1, $k2);
                // array_push($mass2, $k3);
            }
            $summ = 0;
            for ($j=0; $j < count($mass1); $j++) {
                $summ += $mass2[$j]*log($mass2[$j],2);
                echo "$mass1[$j] - $mass2[$j]<br>";
            }
            $summ = round(-$summ, 2);
            echo "H(x) = $summ";
        }

        ?>
        </center></form>
    </div>
</body>
</html>
 
