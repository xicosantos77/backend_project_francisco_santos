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
    <title>TELLO - Perfil de Técnico</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Perfil de Técnico</h1>

<?php
        if(isset($message)){
            echo '<p class="alert alert-danger" role="alert">' . $message . '</p>';
        }
?>

        <table class="table table-bordered mt-4">
            <form method="POST" action="/tech_profile/">
                <tbody>
                    <tr>
                        <th>Nome</th>
                        <td>
                            <span><?= $tech["name"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Edite o seu nome..." value="<?= $tech["name"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>
                            <span><?= $tech["email"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Edite o seu e-mail..." value="<?= $tech["email"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Submeter alterações:</th>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-primary" name="tech_update">Atualizar</button>   
                        </td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>
