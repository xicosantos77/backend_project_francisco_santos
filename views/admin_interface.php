<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Interface de Administrador</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container" style="margin-bottom:100px;">
        <h1 class="mt-5" style="margin-bottom:50px;">Menu de Administrador</h1>

        <h4 style="margin-bottom: 20px; margin-top: 20px;">Administradores</h4>
        <a href="/" class="btn btn-secondary">Modificar ou Apagar</a>
        <a href="/" class="btn btn-secondary">Adicionar</a>

        <h4 style="margin-bottom: 20px; margin-top: 20px;">Técnicos</h4>
        <a href="/" class="btn btn-secondary">Modificar ou Apagar</a>
        <a href="/" class="btn btn-secondary">Adicionar</a>

        <h4 style="margin-bottom: 20px; margin-top: 20px;">Clientes</h4>
        <a href="/" class="btn btn-secondary">Modificar ou Apagar</a>
        <a href="/" class="btn btn-secondary">Adicionar</a>

        <h4 style="margin-bottom: 20px; margin-top: 20px;">Produtos</h4>
        <a href="/" class="btn btn-secondary">Modificar ou Apagar</a>
        <a href="/" class="btn btn-secondary">Adicionar</a>

        <h4 style="margin-bottom: 20px; margin-top: 20px;">Reparações</h4>
        <a href="/" class="btn btn-secondary">Modificar ou Apagar</a>
        <a href="/" class="btn btn-secondary">Adicionar</a>

        <h4 style="margin-bottom: 20px; margin-top: 20px;">Geral</h4>
        <a href="/orders_admin/" class="btn btn-secondary" style="margin-right:20px;">Gestão de encomendas</a>
        <a href="/repairs_admin/" class="btn btn-secondary" style="margin-right:20px;">Gestão de reparações</a>
        <a href="/manage_stocks_admin/" class="btn btn-secondary" style="margin-right:20px;">Gestão de stocks</a>
        <a href="/manage_clients_admin/" class="btn btn-secondary" style="margin-right:20px;">Consulta de clientes</a>
        <a href="/tech_profile/" class="btn btn-secondary" style="margin-right:20px;">Perfil de Administrador</a>
        <a href="/" class="btn btn-secondary">Página principal</a>
    </div>

    <?php require("templates/footer.php"); ?>
</body>
</html>
