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

require("models/Users.php");

$model = new Users();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION["user_id"];

    if (
        isset($_POST["name"]) &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60
    ){
        $field = "name";
        $value = $_POST["name"];
    } 
    elseif (
        isset($_POST["email"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)
    ){
        $field = "email";
        $value = $_POST["email"];
    } 
    elseif (
        isset($_POST["street_address"]) &&
        mb_strlen($_POST["street_address"]) >= 8 &&
        mb_strlen($_POST["street_address"]) <= 120
    ){
        $field = "street_address";
        $value = $_POST["street_address"];
    } 
    elseif (
        isset($_POST["city"]) &&
        mb_strlen($_POST["city"]) >= 3 &&
        mb_strlen($_POST["city"]) <= 50
    ){
        $field = "city";
        $value = $_POST["city"];
    } 
    elseif (
        isset($_POST["postal_code"]) &&
        mb_strlen($_POST["postal_code"]) >= 4 &&
        mb_strlen($_POST["postal_code"]) <= 20
    ){
        $field = "postal_code";
        $value = $_POST["postal_code"];
    }
    elseif (
        isset($_POST["country"]) &&
        in_array($_POST["country"], $country_codes)
    ){
        $field = "country";
        $value = $_POST["country"];
    } elseif (
        isset($_POST["phone"]) && 
        mb_strlen($_POST["phone"]) >= 9 &&
        mb_strlen($_POST["phone"]) <= 30
    ) {
        $field = "phone";
        $value = $_POST["phone"];
    }

    if (isset($field) && isset($value)) {
        $model->updateField($user_id, $field, $value);
    }
}

$user_id = $_SESSION["user_id"];
$user = $model->getById($user_id);

require("views/user_profile.php");
?>
