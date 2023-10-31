<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Confirmação de transação</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container" style="margin-bottom:100px;">
        <h1 class="mt-5">Compra Registada com Sucesso</h1>
        <h3 class="mt-5">Obrigado pela sua compra!</h3>

        <p>Continue a navegar pela nossa página:</p>

        <a href="/" class="btn btn-primary">Página principal</a>
        <a href="/user_interface/" class="btn btn-primary">Menu de utilizador</a>
        <a href="/logout/" class="btn btn-primary">Logout</a>
    </div>

    <?php require("templates/footer.php"); ?>
</body>
</html>
