
<?php

require("models/products.php"); 
//faz o display de todos os produtos
$model = new Products(); 


//faz a atualização do stock

foreach($_GET as $key => $value) {
    $_GET[ $key ] = htmlspecialchars(strip_tags(trim($value)));
}

if(
    !empty($_GET["search_content"]) &&
    mb_strlen($_GET["search_content"]) >= 3 &&
    mb_strlen($_GET["search_content"]) <= 60
) {

    $searchResults = $model->searchProducts($_GET["search_content"]);

    http_response_code(202);

    if(empty($searchResults)) {

        http_response_code(404);
        $message = "No results were found.";
    }
}
else {
    $message = "The search must include between 3 and 60 characters.";
}


require("views/search.php");
?>