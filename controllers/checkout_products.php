<?php

//unset($_SESSION["user_id"]);

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["admin_id"])) {
    header("Location: /login/");
    exit;
}

require("models/buyingorders.php");
require("models/products.php");

$modelOrders = new BuyingOrders();
$modelProducts = new Products();

if( !empty($_SESSION["cartproduct"]) ){
    $payment_reference = $modelOrders->getPaymentRef();
    $order_id = $modelOrders->createHeader($_SESSION["user_id"], $payment_reference); 
    
    $total = 0;
    
    foreach($_SESSION["cartproduct"] as $item){
    
        $modelOrders->createDetail($order_id, $item);
        $modelProducts->updateStock($item);
    
        $total += $item["quantity"] * $item["price"];
    }

    unset($_SESSION["cartproduct"]);
}

//unset( $_SESSION["cartproduct"] );

//botao de update de pagamento, confirma se a encomenda está paga pelo cliente
if (isset($_POST["confirm_payment"])) {
    //print_r($_POST);

    $modelOrders -> updateStatus("EP", $_POST["order_id"], $_SESSION["user_id"]);

    header("Location:/payment_confirmation/"); 

}

//controlador para confirmação de encomenda de "ET" para "OK"
if (isset($_POST["confirm_reception"])) {

    $modelOrders -> updateStatus("OK", $_POST["order_id"], $_SESSION["user_id"]);

    header("Location:/myorders_user/"); 

}

require("views/checkout_products.php");

?>