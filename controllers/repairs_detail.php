<?php

require("models/products.php");

if(empty($id) || !is_numeric($id)){   // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(400); 
    //require("e400.html");
    die("Request inválido");
}

$model = new Products();

$subcategories = $model->getDetails($id);

if(empty($subcategories)){    // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(404);
    die("Não encontrado");
}

//print_r($subcategories);

//echo "isto é o subcategories";

require("views/repairs_detail.php");
?>

