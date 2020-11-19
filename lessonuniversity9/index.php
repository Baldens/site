<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <form method="POST">
        <input type="file" name="files">
        <input type="submit">
    </form>
    <?php 
        $tableName = ["Номер записи","Имя","Инициал отчества с точкой","Фамилия","Пол","Город","Область","Адрес электронной почты",
        "Телефон","Дата рождения","Должность","Компания","Вес","Рост","Почтовый адрес", "Почтовый индекс","Код страны"];
        $f = $_POST['files'];
        $openF = nl2br(file_get_contents($f));
        $splitFile = preg_split('/\n/',$openF);
        for ($i=0; $i < count($splitFile); $i++) { 
            $splitFileses[] = preg_split('/,/',$splitFile[$i]);
            echo "<table border='1px'>";
            for ($j=0; $j < 17; $j++) {
                switch ($j) {
                    case 0:
                        if(mb_strlen($splitFileses[$i][$j])<6){
                            $zeroNum = "";
                            $num = 6 - (int)mb_strlen($splitFileses[$i][$j]);
                            for ($p=0; $p < $num; $p++) { 
                                $zeroNum .= "0";
                            }
                            $splitFileses[$i][$j] = $zeroNum . $splitFileses[$i][$j];
                        }
                        break;
                    case 1:
                        
                        break;
                    case 2:

                        break;
                    case 3:
                        
                        break;
                    case 4:
                        if($splitFileses[$i][$j]=="male"){
                            $splitFileses[$i][$j] = "1";
                        }elseif($splitFileses[$i][$j]=="female"){
                            $splitFileses[$i][$j] = "0";
                        }
                        break;  
                    case 5:
                        
                        break;
                    case 6:
                        
                        break;
                    case 7:
                        if(preg_match("/^([aA-zZ]*)@([aA-zZ]*\.[a-z]*)/",$splitFileses[$i][$j])==false){
                            $countStr = mb_substr_count($splitFileses[$i][$j],"@");
                            if($countStr>1){
                                for ($l=0; $l < $countStr; $l++) { 
                                    $a .= "@";
                                }
                                $splitFileses[$i][$j] = str_replace("@@" , "@" , $splitFileses[$i][$j]);
                            }
                        }
                        break;
                    case 8:
                        if(preg_match("/^\d{1,3}-\d{1,3}-\d{1,4}/",$splitFileses[$i][$j])==false){
                            $splitFileses[$i][$j] = preg_replace("/[aA-zZ]/ui", "", $splitFileses[$i][$j]);
                        }
                        elseif(preg_match("/(\d{1}-\d{3}-\d{4})|(\d{2}-\d{3}-\d{4})|(\d{3}-\d{3}-\d{4})/",$splitFileses[$i][$j])==false){
                            $numRepl = preg_replace("/-/","",$splitFileses[$i][$j]);
                            $countNum = mb_strlen($numRepl);
                            if($countNum==8){
                                $replTel = preg_replace("/-/","",$splitFileses[$i][$j]);
                                $splitFileses[$i][$j] = $replTel[0] . "-" . $replTel[1] . $replTel[2] . $replTel[3] . "-" . 
                                $replTel[4] . $replTel[5] . $replTel[6] . $replTel[7];
                            }elseif($countNum==9){
                                $replTel = preg_replace("/-/","",$splitFileses[$i][$j]);
                                $splitFileses[$i][$j] = $replTel[0] . $replTel[1] . "-" . $replTel[2] . $replTel[3] . $replTel[4] . 
                                "-" . $replTel[5] . $replTel[6] . $replTel[7] . $replTel[8];
                            }elseif($countNum==10){
                                $replTel = preg_replace("/-/","",$splitFileses[$i][$j]);
                                $splitFileses[$i][$j] = $replTel[0] . $replTel[1] . $replTel[2] . "-" . $replTel[3] . $replTel[4] . 
                                $replTel[5] . "-" . $replTel[6] . $replTel[7] . $replTel[8] . $replTel[9];
                            }
                        }
                        break;
                    case 9:
                        $a = $splitFileses[$i][$j];
                        $splitsDate = preg_split("/\//",$a);
                        for ($h=0; $h < 2; $h++) { 
                            if(mb_strlen($splitsDate[$h])==1){
                                $splitsDateses[$h] = "0" . (string)$splitsDate[$h];
                            }
                            else{
                                $splitsDateses[$h] = (string)$splitsDate[$h];
                            }
                        }
                        $splitFileses[$i][$j] = $splitsDateses[1] . "." . $splitsDateses[0] . "." . $splitsDate[2];
                        break;
                    case 10:
                            
                        break;
                    case 11:
                                
                        break;
                    case 12:
                        $splitFileses[$i][$j] = round($splitFileses[$i][$j], 0, PHP_ROUND_HALF_UP);   
                        break;
                    case 13:
                        
                        break;
                    case 14:
                        if(preg_match("/\d*(\s[aA-zZ]*)/",$splitFileses[$i][$j])==false){
                            $splitFileses[$i][$j] = preg_replace("/[^aA-zA|\s|\d]+/", "", $splitFileses[$i][$j]);
                        }
                        $splitStreet = preg_split("/\s/",$splitFileses[$i][$j]);
                        $text = ""; 
                        for ($p=1; $p < count($splitStreet); $p++) { 
                            $text .= " " . $splitStreet[$p];
                        }
                        $text = $text . ", " . $splitStreet[0];
                        $splitFileses[$i][$j] = $text;
                        break;
                    case 15:
                        
                        break;
                    case 16:
                        
                        break;
                    default:
                        # code...
                        break;
                }
            echo "<tr><th>$tableName[$j]</th><td>" . iconv('windows-1251', 'utf-8', nl2br($splitFileses[$i][$j])) . "</td></tr>";
        }
        echo "</table>";
        $writeImplodeMass[] = implode(";",$splitFileses[$i]);
    }
    $writeInFile = implode("\n",$writeImplodeMass);
    $writeInFile = preg_replace("/\<br\s\/\>/", "", $writeInFile);
    $newfiles = "sortword.txt";
    $fh = fopen($newfiles, 'w') or die("Can't create file");
    fwrite($fh, $writeInFile);
    fclose($fh);
    ?>
</body>
</html>