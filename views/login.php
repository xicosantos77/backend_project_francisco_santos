<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Login</title>
</head>
<body>

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

    <div class="container" style="margin-bottom:250px;">
        <h1 class="mt-5">Bem vindo, utilizador!</h1>
        <h4 class="mt-2">Entre na sua conta:</h4>

        <?php
        if(isset($message)){
            echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
        }
        ?>

        <p>Se ainda não tiver conta <a href="/register/">crie uma facilmente.</a></p>
        <form method="POST" action="/login/">
            <div class="mb-3 text-center">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control mx-auto" style="max-width: 300px;" id="email" name="email" placeholder="Insira o seu email" required>
            </div>
            <div class="mb-3 text-center">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control mx-auto" style="max-width: 300px;" id="password" name="password" required minlength="8" maxlength="1000">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" name="send" class="btn btn-primary">Login</button>
            </div>
            <nav class="mt-4">
                <p>Inicar sessão como:</p>
                <a class="btn btn-secondary" href="/login_admin/">Administrador</a>
                <a class="btn btn-secondary" href="/login_tech/">Técnico</a>
            </nav>
        </form>
    </div>

    <?php require("templates/footer.php"); ?>

</body>
</html>
