<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>TELLO - Gestão de Produto</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Gestão de Produto - <?= $product["name"] ?></h1>
        <table class="table" style="margin-bottom:50px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Name</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Atualizar Produto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="/manage_product/" method="POST">
                        <td><?= $product["product_id"] ?></td>
                        <td style="width:30%;"><img style="transform: scale(0.3); position: relative; top: -150px;" src="<?= $product["image"] ?>" alt=""></td>
                        <td style="width:30%;">
                            <input type="text" class="form-control" name="name" id="name" value="<?= $product["name"] ?>">
                        </td>
                        <td style="width:50%;">
                            <textarea class="form-control" name="description" id="description" rows="8"><?= $product["description"] ?></textarea>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="price" id="price" value="<?= $product["price"] ?>">
                        </td>
                        <td>
                            <button type="submit" class="btn btn-secondary" name="update_product">Modificar</button>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>
