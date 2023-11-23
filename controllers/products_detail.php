
<?php

require("models/products.php");

if(empty($id) || !is_numeric($id)){   // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(400); 
    die("Request inválido");
}

$model = new Products();

$subcategories = $model->getDetails($id);

if(empty($subcategories)){    // codigo de erro caso nao exista nada que tenha sido fetch
    http_response_code(404);
    die("Não encontrado");
}

require("views/products_detail.php");
?>



