<?php

if( !isset($_SESSION["user_id"])) {

    header("Location: /login/");
    exit;
}


require("models/repairorders.php"); 

$model = new RepairOrders();

$user_id = $_SESSION["user_id"];

$repairs = $model->getAllRepairsByUserId($user_id);

require("views/myrepairs_user.php");
?>