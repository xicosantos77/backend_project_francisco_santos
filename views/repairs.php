<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO Repair</title>
</head>
<body>

    <header class="container-fluid">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <h1>T E L L O</h1>
                </div>
                <div class="col-9 d-flex align-items-center justify-content-end">
                    <div class="row">
                        <div class="col-6">
                            <input class="form-control" type="text" placeholder="Pesquisar">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-dark" type="button" id="search-button">Search</button>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-secondary"><a href="contact.html">Contact</a></button>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-secondary"><a href="login.html">Login</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <nav class="container-fluid header2">
        <ul class="nav row">
            <li class="nav-item col-6">
                <a href="/" class="nav-link">REPARAÇÕES</a>
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
                <h3>Reparações</h3>
                <h4>Selecione a marca</h4>
                <div class="row">
<?php
                foreach($categories as $category){
                    echo'
                        <div class="col-3 mx-auto">
                            <a href="/repairs_subcategories/'.$category["product_cat_id"].'">
                                <img src="'.$category["image"].'" alt="test" class="img-fluid" style="height:200px">
                                <p class="nav-item">'.$category["name"].'</p>
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
