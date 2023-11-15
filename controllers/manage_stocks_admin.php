<?php

if( !isset($_SESSION["admin_id"])) {
    header("Location: /login/");
    exit;
}

require("models/products.php"); 
//faz o display de todos os produtos
$model = new Products(); 


//faz a atualização do stock

if(isset($_POST["update_stock"])){

    $product_id = $_POST["product_id"];
    $stock = $_POST["stock"];
    $stock_amount = $_POST["stock_amount"];
    
    $modelStocks = new Products();
    $stocks = $modelStocks->manageStock($product_id, $stock_amount);
    
}

$products = $model->getAllDetailsByCategory();

require("views/manage_stocks_admin.php");
?>