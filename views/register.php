<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Registo</title>

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

    <div class="container">
        <h1 class="mt-5">Crie uma conta</h1>
        <p>Se já tiver conta, <a href="/login/">faça login</a></p>
        
<?php
        if(isset($message)){
            echo '<p class="alert alert-danger" role="alert">' . $message . '</p>';
        }
?>

        <form method="POST" action="/register/">
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
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="street_address" class="form-label">Morada</label>
                <input type="text" class="form-control" name="street_address" id="street_address" required minlength="8" maxlength="120">
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="city" class="form-label">Cidade</label>
                <input type="text" class="form-control" name="city" id="city" required minlength="3" maxlength="50">
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="postal_code" class="form-label">Código Postal</label>
                <input type="text" class="form-control" name="postal_code" id="postal_code" required minlength="4" maxlength="20">
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="country" class="form-label">País</label>
                <select class="form-select" name="country" id="country">
<?php
                    foreach($countries as $country){
                        $selected = $country["code"] === "PT" ? " selected" : "";

                        echo '
                            <option value ="' . $country["code"] . '"' . $selected . '>' . $country["name"] . '</option>
                        ';
                    }
?>
                </select>
            </div>
            <div class="mb-3 mx-auto" style="max-width: 300px;">
                <label for="phone" class="form-label">Telefone</label>
                <input type="text" class="form-control" name="phone" id="phone" required minlength="9" maxlength="30">
            </div>
            <div class="mb-3 form-check mx-auto">
                <input type="checkbox" class="form-check-input" name="agrees" id="agrees" required>
                <label class="form-check-label" for="agrees">Aceita os nossos <a href="/termsandconditions/">termos e condiçoes</a>?</label>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary" name="send">Criar</button>
            </div>
        </form>
    </div>

    <?php require("templates/footer.php"); ?>
</body>
</html>
