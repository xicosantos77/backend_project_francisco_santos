<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/product/product.css">
    <title>TELLO Repair</title>
</head>
<body>

    <?php require("templates/header.php"); ?>
    
    <nav class="container-fluid header2">
        <ul class="nav row">
            <li class="nav-item col-6">
<?php
                echo'
                    <a href="/products/"class="nav-link">MARCAS</a>
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
                        <div class="col-3 mx-auto">
                            <img src="<?= $product["image"] ?>" alt="test" class="img-fluid" style="height:200px">
                        </div>
                        <div class="col-9 mx-auto text-right">
                            <p> <?= $product["name"] ?> </p>
                            <p> <?= $product["description"] ?> </p>
                            <p>Desde: <?= $product["price"] ?> €</p>
                        </div>
                        <div class="col-12 mx-auto text-right">
                            <form method="POST" action="/cartproduct/">
                                <label>
                                    Quantidade
                                    <input 
                                        type="number"
                                        name="quantity"
                                        required
                                        min="1"
                                        max="<?=$product["stock"]?>"
                                        value="1"
                                        style="width: 60px; height: 40px;"
                                    >
                                </label>
                                <input type="hidden" name="product_id" value="<?= $product["product_id"] ?>">
                                <button type="submit" name="send" class="btn btn-secondary"> COMPRAR </button>
                            </form>
                        </div>                 
                    </div>
                
            </div>
        </section>
    </main>

    <?php require("templates/footer.php"); ?>
</body>
</html>
