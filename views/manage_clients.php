<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>TELLO - Gestão de Clientes</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Consulta de Clientes</h1>

        <table class="table" style="margin-bottom:50px;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Morada</th>
                    <th>Cidade</th>
                    <th>Código Postal</th>
                    <th>Telefone</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <tr>
                        <td><?= $user["user_id"] ?></td>
                        <td><?= $user["name"] ?></td>
                        <td><?= $user["email"] ?></td>
                        <td><?= $user["street_address"] ?></td>
                        <td><?= $user["city"] ?></td>
                        <td><?= $user["postal_code"] ?></td>
                        <td><?= $user["phone"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>
