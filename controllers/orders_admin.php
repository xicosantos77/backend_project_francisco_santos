<?php

if( !isset($_SESSION["admin_id"])) {

    header("Location: /login/");
    exit;
}


require("models/buyingorders.php"); 

$model = new BuyingOrders();
$orders = $model->getAllOrdersByOrderDate();

//controlador para confirmação de encomenda de "EP" para "PE"
if (isset($_POST["confirm_processing"])) {

    $model -> updateStatus("PE", $_POST["order_id"], $_POST["user_id"]);

    header("Location:/orders_admin/"); 

}

//controlador para confirmação de encomenda de "EP" para "ET"
if (isset($_POST["confirm_shipping"])) {

    $model -> updateStatusForShipping("ET", $_POST["order_id"], $_POST["user_id"]);

    header("Location:/orders_admin/"); 

}

if (isset($_POST["confirm_reception"])) {

    $model -> updateStatusForShipping("OK", $_POST["order_id"], $_POST["user_id"]);

    header("Location:/orders_admin/"); 

}

if (isset($_POST["delete_order"])) {

    $model -> deleteOrder($_POST["order_id"], $_POST["user_id"]);

    header("Location:/orders_admin/"); 

}

require("views/orders_admin.php");
?>