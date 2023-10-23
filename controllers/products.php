<?php

require("models/products_categories.php");

$model = new Product_categories();

$categories = $model->get();

//print_r($categories);

require("views/products.php");
?>