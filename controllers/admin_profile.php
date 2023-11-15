<?php

if (!isset($_SESSION["admin_id"])){
    header("Localtion: /login/");
    exit;
}
/*
require("models/stores.php");
$modelStores = new Stores();
$stores = $modelStores->get();

$store_ids = [];
foreach($stores as $store){
    $store_ids[] = $store["name"];
}
*/
require("models/admins.php");
$model = new Admins();
$admin_id = $_SESSION["admin_id"];

if (isset($_POST["admin_update"])) {

    foreach($_POST as $key => $value){
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if(
        isset($_POST["name"]) &&
        isset($_POST["email"]) &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60 &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ){
        $model->updateAdmin($_POST, $admin_id);

        header("Location: /admin_profile/");
    }
    else{
        $message = "Por favor preencha os dados correctamente.";
    }
}

$admin = $model->getById($admin_id);

require("views/admin_profile.php");

?>