<?php

if( !isset($_SESSION["admin_id"])) {

    header("Location: /login/");
    exit;
}

require("views/admin_interface.php");
?>