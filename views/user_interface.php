<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Interface de Utilizador</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container" style="margin-bottom:100px;">
        <h1 class="mt-5" style="margin-bottom:50px;">Menu de Utilizador</h1>

        <a href="/myorders_user/" class="btn btn-secondary" style="margin-right:20px;">As minhas encomendas</a>
        <a href="/myrepairs_user/" class="btn btn-secondary" style="margin-right:20px;">As minhas reparações</a>
        <a href="/user_profile/" class="btn btn-secondary" style="margin-right:20px;">O meu perfil</a>
        <a href="/" class="btn btn-secondary">Página principal</a>
    </div>

    <?php require("templates/footer.php"); ?>
</body>
</html>
