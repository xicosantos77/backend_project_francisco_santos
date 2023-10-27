<?php

if (isset($_POST["send"])) {
    
    require("models/product_repair_prices.php");

    $model = new ProductRepairPrices();
    $product_id = $_POST["product_id"];
    $repair_cat_id = $_POST["repair_cat_id"];

    
    $repair = $model->getPriceByProductAndRepair([
        "product_id" => $product_id,
        "repair_cat_id" => $repair_cat_id
    ]);

    print_r($repair);

    if (
        !empty($product)
    ) {
        // Add the items to the cart
        $_SESSION["cartrepair"][$product_id] = [
            "product_id" => $product_id,
            "name" => $product["name"],
            "price" => $product["price"],
        ];

        header("Location:/cartrepair/");
    }
}
/*
// To remove items from the cart
if (isset($_POST["request"]) && $_POST["request"] === "removeProduct") {
    $product_id = $_POST["product_id"];

    if (isset($_SESSION["cartproduct"][$product_id])) {
        unset($_SESSION["cartproduct"][$product_id]);
    }
}
*/
require("views/cartrepair.php");

?> 