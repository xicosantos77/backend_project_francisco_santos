<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Registo de Técnicos</title>

</head>
<body>

    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Criação de conta de Técnicos</h1>
        
<?php
        if(isset($message)){
            echo '<p class="alert alert-danger" role="alert">' . $message . '</p>';
        }
?>

        <form method="POST" action="/tech_register/">
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" id="name" required minlength="3" maxlength="60">
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" required minlength="8" maxlength="1000">
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="password_confirm" class="form-label">Repetir Password</label>
                <input type="password" class="form-control" name="password_confirm" id="password_confirm" required minlength="8" maxlength="1000">
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="send">Criar</button>
            </div>
        </form>
    </div>

    <?php require("templates/footer.php"); ?>
</body>
</html>
