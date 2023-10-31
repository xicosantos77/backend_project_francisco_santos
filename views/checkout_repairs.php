<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Checkout de reparações</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container" style="margin-bottom:100px;">
        <h1 class="mt-5">Compra Registada com Sucesso</h1>
        <h3 class="mt-5">Por favor, efectue o pagamento:</h3>
        <dl class="mt-4">
            <dt class="fw-bold">Número encomenda</dt>
            <dd><?= $repair_order_id ?></dd>
            <dt class="fw-bold">Referência de pagamento</dt>
            <dd><?= $payment_reference ?></dd>
            <dt class="fw-bold">Total a pagar</dt>
            <dd><?= $total ?> €</dd>
        </dl>

        <form action="/checkout_repairs/" method="POST">
            <button type="submit" class="btn btn-primary" name="confirm_order_payment" id="confirm_payment">Confirmar Pagamento</button>
            <input type="hidden" name="repair_order_id" value="<?=$repair_order_id?>">
        </form>
    </div>

    <?php require("templates/footer.php"); ?>

   
</body>
</html>
