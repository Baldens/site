<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once 'database.php'; 
    include_once 'product.php';

    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);
    $stmt = $product->read();
    $num = $product->rowCount();
    if($num>0) {
        $products_arrs=array();

        for ($j=0; $j < $num; $j++) { 
            $product_item=array("id" => $stmt[$j][0], "name" => $stmt[$j][1], "company" => $stmt[$j][2],
            "category" => $stmt[$j][3], "quantity" => $stmt[$j][4]);

            array_push($products_arrs, $product_item);
        }
        echo json_encode($products_arrs,JSON_UNESCAPED_UNICODE);
    }
    else{
        echo json_encode(
        array("message" => "No products found.") );
    }
?>