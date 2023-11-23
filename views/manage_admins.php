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
    <title>TELLO - Gestão de Administradores</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Consulta de Administradores</h1>
        
        <form action="/manage_admins/" method="POST">
            <table class="table" style="margin-bottom:50px;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Alterar Nome</th>
                        <th>Alterar Email</th>
                        <th>Submeter</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin) { ?>
                        <tr>
                            <td><?= $admin["admin_id"] ?></td>
                            <td><?= $admin["name"] ?></td>
                            <td><?= $admin["email"] ?></td>
                            <td>
                                <input type="text" class="form-control" name="name_<?= $admin["admin_id"] ?>" id="name" value="<?= $admin["name"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="email_<?= $admin["admin_id"] ?>" id="email" value="<?= $admin["email"] ?>">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-secondary" name="admin_update" value="<?= $admin["admin_id"] ?>">Alterar</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" name="delete_admin" value="<?= $admin["admin_id"] ?>">X</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>

