<?php

if( !isset($_SESSION["tech_id"])) {

    header("Location: /login/");
    exit;
}

require("models/users.php"); 

$model = new Users(); 
$users = $model->getAll(); 


require("views/manage_clients.php");
?>