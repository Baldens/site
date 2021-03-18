<?php
    class Database{

        function getConnection(){
            $mysql = @mysqli_connect('localhost','mysql','mysql','university');
            if(!$mysql) die('Error!');
            $getData = $mysql->query("SELECT * FROM `datacamping`");
            return $getData;
        }
        
        
    }
?>