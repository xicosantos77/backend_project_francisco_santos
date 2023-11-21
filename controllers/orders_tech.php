<?php

if( !isset($_SESSION["tech_id"])) {

    header("Location: /login/");
    exit;
}


require("models/buyingorders.php"); 

$model = new BuyingOrders();
$orders = $model->getAllOrdersByOrderDate();

//controlador para confirmação de encomenda de "EP" para "PE"
if (isset($_POST["confirm_processing"])) {

    $model -> updateStatus("PE", $_POST["order_id"], $_POST["user_id"]);

    header("Location:/orders_tech/"); 

}

//controlador para confirmação de encomenda de "EP" para "ET"
if (isset($_POST["confirm_shipping"])) {

    $model -> updateStatusForShipping("ET", $_POST["order_id"], $_POST["user_id"]);

    header("Location:/orders_tech/"); 

}
/*
//controlador para confirmação de encomenda de "ET" para "OK"
if (isset($_POST["confirm_shipping"])) {

    $model -> updateStatusForShipping("OK", $_POST["order_id"], $_SESSION["user_id"]);

    header("Location:/orders_tech/"); 

}
*/

require("views/orders_tech.php");
?>