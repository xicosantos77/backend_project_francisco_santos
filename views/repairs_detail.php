<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Reparação por Detalhe</title>
</head>
<body>

    <?php require("templates/header.php"); ?>
    
    <nav class="container-fluid header2">
        <ul class="nav row">
            <li class="nav-item col-6">
<?php
                echo'
                    <a href="/repairs/"class="nav-link">REPARAÇÕES</a>
                ';
?>
            </li>
            <li class="nav-item col-6">
<?php
                echo'
                    <a href="/"class="nav-link">HOME</a>
                ';
?>          
            </li>
        </ul>
    </nav>

    <main>
        <section class="products">
            <div class="container">
                <h3>Selecione o que procura: </h3>
                <div class="row">
<?php
                foreach($subcategories as $subcategory){
                    echo'
                        <div class="col-3 mx-auto">
                            <a href="/repair/'.$subcategory["product_id"].'">
                                <img src="'.$subcategory["image"].'" alt="test" class="img-fluid" style="height:200px">
                                <p class="nav-item">'.$subcategory["name"].'</p>
                            </a>
                        </div>
                    ';
                }
?>
                    
                </div>
            </div>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>T E L L O</h3>
                </div>
                <div class="col-12">
                    <a href="#">Sobre nós</a>
                </div>
                <div class="col-12">
                    <a href="#">Contactos</a>
                </div>
            </div>
        </div>
        <div class="container socials">
            <div class="row">
                <a href="www.facebook.com" class="col-4">Facebook</a>
                <a href="www.instagram.com" class="col-4">Instagram</a>
                <a href="www.linkedin.com" class="col-4">LinkedIn</a>
            </div>
        </div>
    </footer>

    <!-- Include Bootstrap JS and any other scripts you need -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-fH538G3+HbCOaD9cj6DdAAK4bscF6p6ovlMG8v3bR5Cc5d/A6uBkf5jL6P0kq4I5P" crossorigin="anonymous"></script>
</body>
</html>
