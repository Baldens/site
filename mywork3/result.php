<?php
    session_start();
    $numMass = $_SESSION['countMass'];
    echo  '<img src=' . $_SESSION['savePhoto'][$numMass] . '>' . '<br>' . $_SESSION['saveText'];
    echo $numMass;
    $massNumbers = preg_split("/\n/",file_get_contents("count.txt"));
    $file = fopen("count.txt", "w+");
    fclose($file);
    $cshislo = $massNumbers[$numMass];
    $massNumbers[$numMass] = (int)$cshislo+1;
    $writeInFile = implode("\n",$massNumbers);
    file_put_contents("count.txt", $writeInFile);
?>