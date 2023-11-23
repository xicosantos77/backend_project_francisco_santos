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
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Morada</th>
                    <th>Cidade</th>
                    <th>Código Postal</th>
                    <th>Telefone</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) { ?>
                    <form action="manage_clients_admin.php" method="POST">
                    <tr>
                            <td><?= $user["user_id"] ?></td>
                            <td>
                                <input type="text" class="form-control" name="name" id="name" value="<?= $user["name"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="email" id="email" value="<?= $user["email"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="street_address" id="street_address" value="<?= $user["street_address"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="city" id="city" value="<?= $user["city"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="postal_code" id="postal_code" value="<?= $user["postal_code"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="phone" id="phone" value="<?= $user["phone"] ?>">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-secondary" name="user_update" value="<?= $user["user_id"] ?>">Alterar</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" name="delete_user" value="<?= $user["user_id"] ?>">X</button>
                            </td>
                        </form>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>
