<?php

if( !isset($_SESSION["admin_id"])) {

    header("Location: /login/");
    exit;
}

require("models/products.php");

if(empty($id) || !is_numeric($id)){   // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(400); 
    //require("e400.html");
    die("Request inválido");
}

$model = new Products();
$product = $model->getProductById($id);


if(empty($product)){    // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(404);
    die("Não encontrado");
}

if (isset($_POST["update_product"])){

    print_r("funca");
    if (
        isset($_POST["name"]) &&
        isset($_POST["description"]) &&
        isset($_POST["price"]) &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 120 &&
        mb_strlen($_POST["description"]) >= 3 &&
        mb_strlen($_POST["description"]) <= 1000 &&
        is_numeric($_POST["price"])
    ){
        $model->updateProduct($_POST, $_POST["update_product"]);

        header("Location: /manage_product/" . $_POST["product_id"]);
    }
    else {
        $message = "Por favor preencha os campos corretamente.";
    }

}


if (isset($_POST["delete_product"])){
    $model->deleteProduct($_POST["delete_product"]);
    header("Location:/manage_products/");
    exit;
}



require("views/manage_product.php");
?>