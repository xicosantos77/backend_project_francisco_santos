<?php

if (!isset($_SESSION["admin_id"])) {
    header("Location: /login/");
    exit;
}

require("models/users.php");

$model = new Users();
$users = $model->getAll();

foreach ($users as $user) {

    foreach($_POST as $key => $value){       //sanitizaão de texto para todos os campos
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if (isset($_POST["user_update"]) && $_POST["user_update"] == $user["user_id"]) {

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
            $model->updateUser($_POST, $user["user_id"]);

            header("Location: /manage_clients_admin/");
        }
        else {
            $message = "Por favor preencha os campos corretamente.";
        }
    }

    if (isset($_POST["delete_user"]) && $_POST["delete_user"] == $user["user_id"]) {
        $model->deleteUser($user["user_id"]);
        header("Location:/manage_clients_admin/");
        exit;
    }
}

require("views/manage_clients_admin.php");
?>
