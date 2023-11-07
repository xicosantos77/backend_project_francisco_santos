<?php

if (!isset($_SESSION["tech_id"])){
    header("Localtion: /login/");
    exit;
}

require("models/stores.php");
$modelStores = new Stores();
$stores = $modelStores->get();

$store_ids = [];
foreach($stores as $store){
    $store_ids[] = $store["name"];
}

require("models/technicians.php");
$model = new Techs();
$tech_id = $_SESSION["tech_id"];

if (isset($_POST["tech_update"])) {

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
        $model->updateTech($_POST, $tech_id);

        header("Location: /tech_profile/");
    }
    else{
        $message = "Por favor preencha os dados correctamente.";
    }
}

$tech = $model->getById($tech_id);

require("views/tech_profile.php");

?>