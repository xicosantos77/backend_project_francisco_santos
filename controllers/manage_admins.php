<?php

if (!isset($_SESSION["admin_id"])) {
    header("Location: /login/");
    exit;
}

require("models/admins.php");

$model = new Admins();
$admins = $model->getAll();
$admin_id = $_SESSION["admin_id"];

foreach ($admins as $admin) {
    $formNameKey = "name_" . $admin["admin_id"];
    $formEmailKey = "email_" . $admin["admin_id"];

    if (isset($_POST["admin_update"]) && $_POST["admin_update"] == $admin["admin_id"]) {
        $name = htmlspecialchars(strip_tags(trim($_POST[$formNameKey])));
        $email = htmlspecialchars(strip_tags(trim($_POST[$formEmailKey])));

        if (mb_strlen($name) >= 3 && mb_strlen($name) <= 60 && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $model->updateAdmin(["name" => $name, "email" => $email], $admin["admin_id"]);
            header("Location: /manage_admins/");
            exit;
        } else {
            $message = "Por favor preencha os dados corretamente.";
        }
    }

    if (isset($_POST["delete_admin"]) && $_POST["delete_admin"] == $admin["admin_id"]) {
        $model->deleteAdmin($admin["admin_id"]);
        header("Location:/manage_admins/");
        exit;
    }
}

$admin = $model->getById($admin_id);

require("views/manage_admins.php");
?>
