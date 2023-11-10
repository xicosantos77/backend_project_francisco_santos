<?php

if( !isset($_SESSION["admin_id"])) {

    header("Location: /login/");
    exit;
}


require("models/repairorders.php"); 

$model = new RepairOrders();

$repairs = $model->getAllRepairsByRepairDate();

require("views/repairs_tech.php");

//controlador para confirmação de encomenda de "EP" para "PE"
if (isset($_POST["confirm_processing"])) {

    $model -> updateStatus("PE", $_POST["repair_order_id"], $_POST["user_id"]);

    header("Location:/repairs_tech/"); 

}

//controlador para confirmação de encomenda de "PE" para "OK"
if (isset($_POST["confirm_delivery"])) {

    $model -> updateStatusForDelivery("OK", $_POST["repair_order_id"], $_POST["user_id"]);

    header("Location:/repairs_tech/"); 

}

?>