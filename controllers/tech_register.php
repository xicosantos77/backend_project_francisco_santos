<?php

if (!isset($_SESSION["admin_id"])){
    header("Localtion: /login/");
    exit;
}

if (isset($_POST["send"])) {

    foreach ($_POST as $key => $value) {       //sanitização de texto para todos os campos
        $_POST[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    if (
        !empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&    //comando pré-feito p/ validar mail
        $_POST["password"] === $_POST["password_confirm"] &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60 &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000
    ) {

        require("models/technicians.php");
        $model = new Techs();

        $tech = $model->getByEmail($_POST["email"]);

        /* se o utilizador nao existir */
        if (empty($tech)) {
            $createdTech = $model->create($_POST);

            header("Location:/manage_techs/");
        } else {
            $message = "Utilizador já existe.";
        }
    } else {
        $message = "Preencha os campos corretamente";
    }
}

require("views/tech_register.php");

?>
