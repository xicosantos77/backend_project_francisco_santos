<?php

if (!isset($_SESSION["user_id"])) {
    header("Location: /login/");
    exit;
}

require("models/countries.php");

$modelCountries = new Countries();  
$countries = $modelCountries->get();

$country_codes = [];                      
foreach($countries as $country){
    $country_codes[] = $country["code"];   
}

require("models/users.php");
$model = new Users();
$user_id = $_SESSION["user_id"];


if (isset($_POST["user_update"])) {

    foreach($_POST as $key => $value){       //sanitizaão de texto para todos os campos
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if (
        isset($_POST["name"]) &&
        isset($_POST["email"]) &&
        isset($_POST["street_address"]) &&
        isset($_POST["city"]) &&
        isset($_POST["postal_code"]) &&
        isset($_POST["country"]) &&
        isset($_POST["phone"]) && 
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) && 
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60 &&
        mb_strlen($_POST["street_address"]) >= 8 &&
        mb_strlen($_POST["street_address"]) <= 120 &&
        mb_strlen($_POST["city"]) >= 3 &&
        mb_strlen($_POST["city"]) <= 50 &&
        mb_strlen($_POST["postal_code"]) >= 4 &&
        mb_strlen($_POST["postal_code"]) <= 20 &&
        mb_strlen($_POST["phone"]) >= 9 &&
        mb_strlen($_POST["phone"]) <= 30 && 
        in_array($_POST["country"], $country_codes)
    ){
        $model->updateUser($_POST, $user_id);

        header("Location: /user_profile/");
    }
    else {
        $message = "Por favor preencha os campos corretamente.";
    }
}

$user = $model->getById($user_id);

require("views/user_profile.php");
?>
