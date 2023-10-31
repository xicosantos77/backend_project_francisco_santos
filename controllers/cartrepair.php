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
        !empty($repair)
    ){
        // Add the items to the cart
        $_SESSION["cartrepair"][$product_id.":".$repair_cat_id] = [
            "product_id" => $product_id,
            "repair_cat_id" => $repair_cat_id,
            "product_name" => $repair["product_name"],
            "repair_category_name" => $repair["repair_category_name"],
            "price" => $repair["price"]
        ];

                
        header("Location:/cartrepair/");
    }
}

//unset($_SESSION["cartrepair"]);
//var_dump($_SESSION["cartrepair"]);


// To remove items from the cart
if (isset($_POST["request"]) && $_POST["request"] === "removeProduct") {
    $product_id = $_POST["product_id"];

    if (isset($_SESSION["cartrepair"][$product_id])) {
        unset($_SESSION["cartrepair"][$product_id]);
    }
}


require("views/cartrepair.php");

?> 