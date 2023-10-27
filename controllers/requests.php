<?php

header("Content-Type: application/json");

if( isset($_POST["request"]) ) {

    if(
        $_POST["request"] === "removeProduct" &&
        !empty($_POST["product_id"]) &&
        is_numeric($_POST["product_id"])

    ) {

        unset($_SESSION["cartproduct"][intval($_POST["product_id"]) ]);

        echo '{"message":"OK"}';
    }
    elseif(
        $_POST["request"] === "changeQuantity" &&
        !empty($_POST["product_id"]) &&
        is_numeric($_POST["product_id"]) &&
        !empty($_POST["quantity"]) &&
        is_numeric($_POST["quantity"]) &&
        intval($_POST["quantity"]) > 0 &&
        !empty($_SESSION["cartproduct"])
    ){

        require("models/products.php");
        $model = new Products();
        $product = $model->checkStock($_POST);

        if( !empty($product) ) {
        
            $_SESSION["cartproduct"][ $product["product_id"] ]["quantity"] = intval($_POST["quantity"]);

            echo '{"message":"OK"}';

        }
    }
}

?>