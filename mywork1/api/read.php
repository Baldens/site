<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header('Content-Type: application/json');

    include_once '../database.php'; 
    include_once '../product.php';

    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);

    $product->id = isset($_GET['id']) ? $_GET['id'] : die();

    $products = readOne($_GET['id']);

    $product_arr=array("id" => $products['ID_camping'], "name" => $products['name camping'],
    "company" => $products['model camping'], "category" => $products['description'], "quantity" => $products['count']);
    print_r(json_encode($product_arr, JSON_UNESCAPED_UNICODE));

    function readOne($id){
        $mysql = @mysqli_connect('localhost','mysql','mysql','university');
        if(!$mysql) die('Error!');
        $getData = $mysql->query("SELECT * FROM `datacamping` WHERE `ID_camping` = '$id'");
        while($result = mysqli_fetch_array($getData)){
            $mass = $result;
        }

        return $mass;
    }
?>