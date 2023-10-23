
<?php

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

//print_r($product);

//echo "isto é o subcategories";

require("views/product.php");
?>