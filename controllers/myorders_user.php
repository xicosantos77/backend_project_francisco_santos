<?php

if( !isset($_SESSION["user_id"])) {

    header("Location: /login/");
    exit;
}


require("models/buyingorders.php"); 

$model = new BuyingOrders();

$user_id = $_SESSION["user_id"];

$orders = $model->getAllOrdersByUserId($user_id);

require("views/myorders_user.php");
?>