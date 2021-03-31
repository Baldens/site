<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header('Content-Type: application/json');

    include_once 'database.php';
    include_once 'product.php';
    $database = new Database();
    $db = $database->getConnection();
    $product = new Product($db);

    $product->id = isset($_GET['id']) ? $_GET['id'] : die();

    $product->readOne();

    $product_arr=array("id" => $product->id, "name" => $product->name,
    "company" => $product->company,
    "category" => $product->category, "quantity" => $product->quantity,
    "description" => $product->description, "price" => $product->price);
    print_r(json_encode($product_arr, JSON_UNESCAPED_UNICODE));

    function readOne(){
        $query = "SELECT
        'name camping', ID_camping, model camping, 'description', 'count',
        FROM " . $this->table_name . " WHERE ID_camping = ? LIMIT 0,1";
        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
        $this->company = $row['company'];
        $this->category = $row['category'];
        $this->quantity = $row['quantity'];
?>