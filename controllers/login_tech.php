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
        
        require("models/technicians.php"); 

        $model = new Techs();

        $tech = $model->getTechByEmail($_POST["email"]);

        if(
            !empty($tech) &&
            $_POST["password"] = $tech["password"]
        ) {
            $_SESSION["tech_id"] = $tech["tech_id"];    // inicia a sessao
            $_SESSION["tech_name"] = $tech["name"];
            header("Location:/tech_interface/");
        }
        else{
            $message = "Email ou password incorrectos";
        }

    } 
    else {
        $message = "Email ou password incorrectos";
    }
}

require("views/login_tech.php");

?>