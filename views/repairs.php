<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO Repair</title>
</head>
<body>

    <?php require("templates/header.php"); ?>
    
    <nav class="container-fluid header2">
        <ul class="nav row">
            <li class="nav-item col-6">
<?php
                echo'
                    <a href="/products/"class="nav-link">PRODUTOS</a>
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

    <?php require("templates/footer.php"); ?>
</body>
</html>
