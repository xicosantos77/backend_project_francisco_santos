<?php

if( !isset($_SESSION["admin_id"])) {

    header("Location: /login/");
    exit;
}

require("models/products.php"); 
//faz o display de todos os produtos
$model = new Products(); 

$products = $model->getAllDetailsById();


require("views/manage_products.php");
?>