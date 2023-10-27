<?php


if ( isset($_POST["send"])){

    require("models/products.php"); 

    $model = new Products(); 
    $product = $model -> getProductById($_POST["product_id"]);

    //print_r($product);
    //print_r($_POST["product_id"]);

    if(  //esteriliza info introduzida
        !empty($product) &&
        is_numeric($_POST["quantity"]) &&
        intval($_POST["quantity"]) > 0 &&
        $product["stock"] >= $_POST["quantity"]
    ){
        
        //update stock in the model
        $model->updateStock([
            "product_id" => $product["product_id"],
            "quantity" => intval($_POST["quantity"])
        ]);

        //adiciona os items ao carrinho

        $_SESSION["cartproduct"][ $product["product_id"] ] = [
            "product_id" => $product["product_id"],
            "quantity" => intval($_POST["quantity"]),
            "name" => $product["name"], 
            "price" => $product["price"],
            "stock" => $product["stock"]
        ]; 

        header("Location:/cartproduct/"); 
    }
}

//para remover items do carrinho
if(isset($_POST["request"]) && $_POST["request"] === "removeProduct"){
    $product_id = $_POST["product_id"];
    
    if(isset($_SESSION["cartproduct"][$product_id])){
        unset($_SESSION["cartproduct"][$product_id]);
    }
}

require("views/cartproduct.php")
?> 