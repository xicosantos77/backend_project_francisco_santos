<?php

require("models/products_categories.php");

$model = new Product_categories();

$categories = $model->get();

require("views/repairs.php");
?>