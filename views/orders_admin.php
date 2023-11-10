<!DOCTYPE html>
<html lang="pt">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/home/home.css">
        <title>TELLO - Todas as encomendas</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Encomendas - Menu de Administrador</h1>

        <table class="table" style="margin-bottom:50px;">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>ID da encomenda</th>
                    <th>Data de encomenda</th>
                    <th>Data de pagamento</th>
                    <th>Data de envio</th>
                    <th>Estado</th>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?= $order["client_name"] ?></td>
                        <td><?= $order["order_id"] ?></td>
                        <td><?= $order["order_date"] ?></td>
                        <td><?= $order["payment_date"] ?></td>
                        <td><?= $order["shipping_date"] ?></td>
                        <td><?= $order["status"] ?></td>
                        <td><?= $order["name"] ?></td>
                        <td><?= $order["price_each"] ?></td>
                        <td>
                            <?php if ($order["status"] === "AP") { ?>
                                <p style="margin-bottom: 10px; color:red; font-weight:bold; text-transform: uppercase;">aguarda pagamento</p>
                            <?php } elseif ($order["status"] === "EP") { ?>
                                <p style="margin-bottom: 10px; color:orange; text-transform: uppercase;">pagamento confirmado</p>
                                <form action="/orders_tech/" method="POST">
                                    <button type="submit" class="btn btn-warning" name="confirm_processing" id="confirm_processing">Confirmar Processamento</button>
                                    <input type="hidden" name="order_id" value="<?= $order["order_id"] ?>">
                                    <input type="hidden" name="user_id" value="<?= $order["user_id"] ?>">
                                </form>
                            <?php } elseif ($order["status"] === "PE"){ ?>
                                <p style="margin-bottom: 10px; color:green; text-transform: uppercase;">pronto para envio</p>
                                <form action="/orders_tech/" method="POST">
                                    <button type="submit" class="btn btn-success" name="confirm_shipping" id="confirm_processing">Confirmar Envio</button>
                                    <input type="hidden" name="order_id" value="<?= $order["order_id"] ?>">
                                    <input type="hidden" name="user_id" value="<?= $order["user_id"] ?>">
                                </form>
                            <?php } elseif ($order["status"] === "ET"){ ?>
                                <p style="margin-bottom: 10px; color:grey; text-transform: uppercase;"> aguarda entrega </p>
                            <?php } else { ?> 
                                <p style="margin-bottom: 10px; color:green; font-weight:bold; text-transform: uppercase;"> encomenda finalizada </p>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>



    <?php require("templates/footer.php"); ?>
</body>
</html>
