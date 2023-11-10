<?php

if( !isset($_SESSION["tech_id"])) {

    header("Location: /login/");
    exit;
}

require("models/products.php"); 
//faz o display de todos os produtos
$model = new Products(); 
$products = $model->getAllDetailsByCategory([]);

//faz a atualização do stock

if(isset($_POST["update_stock"])){

    $product_id = $_POST["product_id"];
    $stock = $_POST["stock"];
    $stock_amount = $_POST["stock_amount"];
    
    
    print_r($product_id);
//    print_r($stock);
    print_r($stock_amount);

    
    $modelStocks = new Products();
    $stocks = $modelStocks->manageStock($product_id, $stock_amount);
    

    ("Location:/manage_stocks/");
}



require("views/manage_stocks.php");
?>