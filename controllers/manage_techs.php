<?php

if (!isset($_SESSION["admin_id"])) {
    header("Location: /login/");
    exit;
}

require("models/technicians.php");

$model = new Techs();
$techs = $model->getAll();


foreach ($techs as $tech) {
    $formNameKey = "name_" . $tech["tech_id"];
    $formEmailKey = "email_" . $tech["tech_id"];

    if (isset($_POST["tech_update"]) && $_POST["tech_update"] == $tech["tech_id"]) {
        $name = htmlspecialchars(strip_tags(trim($_POST[$formNameKey])));
        $email = htmlspecialchars(strip_tags(trim($_POST[$formEmailKey])));

        if (mb_strlen($name) >= 3 && mb_strlen($name) <= 60 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $model->updateTech(["name" => $name, "email" => $email], $tech["tech_id"]);
            header("Location: /manage_techs/");
            exit;
        } else {
            $message = "Por favor preencha os dados corretamente.";
        }
    }

    if (isset($_POST["delete_tech"]) && $_POST["delete_tech"] == $tech["tech_id"]) {
        $model->deleteTech($tech["tech_id"]);
        header("Location:/manage_techs/");
        exit;
    }
}

require("views/manage_techs.php");
?>
