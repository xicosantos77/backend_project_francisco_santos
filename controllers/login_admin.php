<?php

if( isset($_POST["send"]) ) {

    foreach($_POST as $key => $value) {
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if(
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000
    ) {
        
        require("models/admins.php"); 

        $model = new Admins();

        $admin = $model->getAdminByEmail($_POST["email"]);

        if(
            !empty($admin) &&
            $_POST["password"] = $admin["password"]
            //password_verify($_POST["password"], $user["password"])  //verifica pass nao encriptada com a encriptada
        ) {
            $_SESSION["admin_id"] = $admin["admin_id"];    // inicia a sessao
            $_SESSION["admin_name"] = $admin["name"];
            header("Location:/admin_interface/");
        }
        else{
            $message = "Email ou password incorrectos";
        }

    } 
    else {
        $message = "Email ou password incorrectos";
    }
}

require("views/login_admin.php");

?>