<?php

//unset($_SESSION["user_id"]);

if( !isset($_SESSION["user_id"])) {

    header("Location: /login/");
    exit;

}
/*
if( empty($_SESSION["cartproduct"]) ) {
    header("Location: /products/");
    exit;
}
*/
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
    print_r($_POST);

    $modelOrders -> updateStatus("EP", $_POST["order_id"], $_SESSION["user_id"]);

    header("Location:/payment_confirmation/"); 

}

require("views/checkout_products.php");

?>