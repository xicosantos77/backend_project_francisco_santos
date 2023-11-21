<?php

if( isset($_POST["send"]) ) {
    
    foreach($_POST as $key => $value) {
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if(
        !empty($_POST["email"]) &&
        !empty($_POST["name"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60
    ) {
        

        require("models/subscriptions.php"); 

        $model = new Subscriptions();

        $email = $model->getByEmail($_POST["email"]);

        if(
            !empty($email) &&
            $_POST["email"] = $email["email"]
        ) {
            $submessage_error = "Email já introduzido";
        }
        else{
            $createdSub = $model->create($_POST);

            $submessage_success = "Subscrição creada com sucesso";
        }

    } 
    else {
        $submessage_error = "Erro na introdução dos dados";
    }

    require("views/home.php");
}

?>