<?php

session_start();

define("ENV", parse_ini_file(".env") );

//tranforma o caminho em array
$url_parts = explode("/",$_SERVER["REQUEST_URI"]);

$controller = $url_parts[1];   //parte do site em que estamos 

//se nao existir nada no primeiro elemento do URL:
if(empty($controller)){
    $controller = "home";
}

//ID do URL em que estou
if(!empty($url_parts[2])){
    $id = $url_parts[2];      //id da parte em que estamos
}

//COMEÇA O MVC AQUI

require("controllers/" .$controller. ".php");   

?>