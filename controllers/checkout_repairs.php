<?php

if( !isset($_SESSION["user_id"])) {

    header("Location: /login/");
    exit;

}

require("models/repairorders.php");

$modelOrders = new RepairOrders();

if( !empty($_SESSION["cartrepair"]) ){
    $payment_reference = $modelOrders->getPaymentRef();
    $repair_order_id = $modelOrders->createHeader($_SESSION["user_id"], $payment_reference); 
    
    $total = 0;
    
    foreach($_SESSION["cartrepair"] as $item){
    
        $modelOrders->createDetail($repair_order_id, $item);
        $total += $item["price"];
    }

    unset($_SESSION["cartrepair"]);
}

//botao de update de pagamento, confirma se a encomenda está paga pelo cliente
if (isset($_POST["confirm_order_payment"])) {

    $modelOrders -> updateStatus("EP", $_POST["repair_order_id"], $_SESSION["user_id"]);
    header("Location:/payment_confirmation/"); 

}

require("views/checkout_repairs.php");
?>