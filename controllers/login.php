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
        
        require("models/users.php"); 

        $model = new Users();

        $user = $model->getByEmail($_POST["email"]);

        if(
            !empty($user) &&
            $_POST["password"] = $user["password"]
        ) {
            $_SESSION["user_id"] = $user["user_id"];    // inicia a sessao
            $_SESSION["user_name"] = $user["name"];
            header("Location:/user_interface/");
        }
        else{
            $message = "Email ou password incorrectos";
        }

    } 
    else {
        $message = "Email ou password incorrectos";
    }
}

require("views/login.php");

?>