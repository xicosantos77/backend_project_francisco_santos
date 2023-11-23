<?php

require("models/products_categories.php");

if(empty($id) || !is_numeric($id)){   // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(400); 
    die("Request inválido");
}

$model = new Product_categories();

$subcategories = $model->getAllSubcategories($id);

if(empty($subcategories)){    // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(404);
    die("Não encontrado");
}


require("views/products_by_subcategory.php");
?>


