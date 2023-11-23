<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>TELLO - Perfil de Utilizador</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Perfil de Utilizador</h1>

<?php
        if(isset($message)){
            echo '<p class="alert alert-danger" role="alert">' . $message . '</p>';
        }
?>

        <table class="table table-bordered mt-4">
            <form method="POST" action="/user_profile/">
                <tbody>
                    <tr>
                        <th>Nome</th>
                        <td>
                            <span><?= $user["name"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Edite o seu nome..." value="<?= $user["name"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>E-mail</th>
                        <td>
                            <span><?= $user["email"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Edite o seu e-mail..." value="<?= $user["email"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Rua</th>
                        <td>
                            <span><?= $user["street_address"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="street_address" id="street_address" placeholder="Edite a sua rua..." value="<?= $user["street_address"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Localidade</th>
                        <td>
                            <span><?= $user["city"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="city" id="city" placeholder="Edite a sua cidade..." value="<?= $user["city"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Código Postal</th>
                        <td>
                            <span><?= $user["postal_code"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Edite o seu código-postal..." value="<?= $user["postal_code"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>País</th>
                        <td>
                            <span><?= $user["country"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="country" id="country" placeholder="Edite o seu país..." value="<?= $user["country"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Contacto</th>
                        <td>
                            <span><?= $user["phone"] ?></span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Edite o seu contacto..." value="<?= $user["phone"] ?>">
                        </td>
                    </tr>
                    <tr>
                        <th>Submeter alterações:</th>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-sm btn-primary" name="user_update">Atualizar</button>   
                        </td>
                    </tr>
                </tbody>
            </form>
        </table>
    </div>
    <?php require("templates/footer.php"); ?>
</body>
</html>
