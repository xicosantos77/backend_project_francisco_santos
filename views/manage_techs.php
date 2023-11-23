<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>TELLO - Gestão de Técnicos</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Consulta de Técnicos</h1>
        
        <form action="/manage_techs/" method="POST">
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
                    <?php foreach ($techs as $tech) { ?>
                        <tr>
                            <td><?= $tech["tech_id"] ?></td>
                            <td><?= $tech["name"] ?></td>
                            <td><?= $tech["email"] ?></td>
                            <td>
                                <input type="text" class="form-control" name="name_<?= $tech["tech_id"] ?>" id="name" value="<?= $tech["name"] ?>">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="email_<?= $tech["tech_id"] ?>" id="email" value="<?= $tech["email"] ?>">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-secondary" name="tech_update" value="<?= $tech["tech_id"] ?>">Alterar</button>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-danger" name="delete_tech" value="<?= $tech["tech_id"] ?>">X</button>
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
