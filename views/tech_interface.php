<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Interface de Técnico</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container" style="margin-bottom:100px;">
        <h1 class="mt-5" style="margin-bottom:50px;">Menu de Técnico</h1>

        <a href="/orders_tech/" class="btn btn-secondary" style="margin-right:20px;">Gestão de encomendas</a>
        <a href="/repairs_tech/" class="btn btn-secondary" style="margin-right:20px;">Gestão de reparações</a>
        <a href="/manage_stocks/" class="btn btn-secondary" style="margin-right:20px;">Gestão de stocks</a>
        <a href="/manage_clients/" class="btn btn-secondary" style="margin-right:20px;">Consulta de clientes</a>
        <a href="/tech_profile/" class="btn btn-secondary" style="margin-right:20px;">Perfil de técnico</a>
        <a href="/" class="btn btn-secondary">Página principal</a>
    </div>

    <?php require("templates/footer.php"); ?>
</body>
</html>
