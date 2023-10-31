<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/product/product.css">
    <title>TELLO Repair</title>
</head>
<body style="background-color: grey;">

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
        <section class="products" style="margin-bottom: 300px">
            <div class="container">
                <h3>Selecione o que procura: </h3>
                <div class="row">
                
                <?php foreach ($repair as $repair) { ?>
                    <div class="col-2 mx-auto text-right my-3">
                        <div>
                            <img src="<?= $repair["image"] ?>" alt="img" style="width: 100px; height: 100px;">
                        </div>
                        <div>
                            <p style="color: black; margin-top: 10px; font-weight: bold;"><?= $repair["repair_name"] ?></p>
                            <p><?= $repair["price"] ?> €</p>
                        </div>
                        <div>
                            <form method="POST" action="/cartrepair/">
                                <input type="hidden" name="repair_cat_id" value="<?=$repair["repair_cat_id"]?>">
                                <input type="hidden" name="product_id" value="<?=$repair["product_id"]?>">
                                <button type="submit" name="send" class="btn btn-primary">PEDIR</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
                    
                </div>
            </div>
    </main>

    <?php require("templates/footer.php"); ?>
</body>
</html>
