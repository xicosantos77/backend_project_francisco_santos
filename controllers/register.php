<?php

require("models/countries.php");

$modelCountries = new Countries();  //por haver 2 requests no mm view

$countries = $modelCountries->get();

$country_codes = [];                       //criação de array vazio para adicionar o codigo selecionado no form
foreach($countries as $country){
    $country_codes[] = $country["code"];   //ele faz PUSH do pais selecionado para a array vazia
}

if(isset($_POST["send"])){

    foreach($_POST as $key => $value){       //sanitizaão de texto para todos os campos
        $_POST[ $key ] = htmlspecialchars(strip_tags(trim($value)));
    }

    if(
        isset($_POST["agrees"]) &&          //valida se a checkbox está tickada
        !empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["street_address"]) &&
        !empty($_POST["city"]) &&
        !empty($_POST["postal_code"]) &&
        !empty($_POST["country"]) &&
        !empty($_POST["phone"]) &&
        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&    //comando pré feito p/ validar mail
        $_POST["password"] === $_POST["password_confirm"] &&
        mb_strlen($_POST["name"]) >= 3 &&
        mb_strlen($_POST["name"]) <= 60 &&
        mb_strlen($_POST["password"]) >= 8 &&
        mb_strlen($_POST["password"]) <= 1000 &&
        mb_strlen($_POST["street_address"]) >= 8 &&
        mb_strlen($_POST["street_address"]) <= 120 &&
        mb_strlen($_POST["postal_code"]) >= 4 &&
        mb_strlen($_POST["postal_code"]) <= 20 && 
        mb_strlen($_POST["city"]) >= 3 &&
        mb_strlen($_POST["city"]) <= 50 &&
        mb_strlen($_POST["phone"]) >= 9 &&
        mb_strlen($_POST["phone"]) <= 30 &&
        in_array($_POST["country"], $country_codes)  //se $country_codes tiver no array, ta ok
    ){

        require("models/users.php");
        $model = new Users(); 

        $user = $model->getByEmail( $_POST["email"] );

        /* se o utilizador nao existir */
        if( empty($user)) {
            $createdUser = $model->create($_POST); 
            $_SESSION["user_id"] = $createdUser["user_id"];         //usa o session ID como model ja criado
            
            header("Location:/");
        }
        else{
            $message = "Utilizador já existe.";
        }

    } else {
        $message = "Preencha os campos correctamente";
    }
    $_SESSION["user_name"] = $_POST["name"];
}
 

require("views/register.php");

?>
