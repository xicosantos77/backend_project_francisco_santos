<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>TELLO - Gestão de Stocks</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Gestão de Stocks</h1>

<?php
        if(isset($message)){
            echo '<p class="alert alert-danger" role="alert">' . $message . '</p>';
        }
?>

        <table class="table" style="margin-bottom:50px;">
            <thead>
                <tr>
                    <th>Categoria</th>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Stock</th>
                    <th>Atualizar stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?= $product["category_name"] ?></td>
                        <td><?= $product["product_id"] ?></td>
                        <td><?= $product["name"] ?></td>
                        <td><?= $product["stock"] ?> Un.</td>
                        <td>
                            <form action="/manage_stocks/" method="POST">
                                <input type="number" name="stock_amount" id="stock_amount" placeholder="<?= $product["stock"]?>">
                                <button type="submit" class="btn btn-secondary" name="update_stock" id="update_stock" style="margin-left:10px;">Atualizar</button>
                                <input type="hidden" name="product_id" value="<?= $product["product_id"] ?>">
                                <input type="hidden" name="stock" value="<?= $product["stock"] ?>">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>
