<!DOCTYPE html>
<html lang="pt">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/home/home.css">
        <title>TELLO - Todas as reparações</title>
</head>
<body>
    <?php require("templates/header.php"); ?>

    <div class="container">
        <h1 class="mt-5">Reparações</h1>

        <table class="table" style="margin-bottom:50px;">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>ID da Reparação</th>
                    <th>Data de pedido</th>
                    <th>Data de pagamento</th>
                    <th>Data de entrega</th>
                    <th>Estado</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($repairs as $repair) { ?>
                    <tr>
                        <td><?= $repair["name"] ?></td>
                        <td><?= $repair["repair_order_id"] ?></td>
                        <td><?= $repair["order_date"] ?></td>
                        <td><?= $repair["payment_date"] ?></td>
                        <td><?= $repair["delivery_date"] ?></td>
                        <td><?= $repair["status"] ?></td>
                        <td><?= $repair["price_each"] ?></td>
                        <td>
                            <?php if ($repair["status"] === "AP") { ?>
                                <p style="margin-bottom: 10px; color:red; font-weight:bold;">AGUARDA PAGAMENTO</p>
                            <?php } elseif ($repair["status"] === "EP") { ?>
                                <p style="margin-bottom: 10px; color:orange;">PAGAMENTO CONFIRMADO</p>
                                <form action="/repairs_tech/" method="POST">
                                    <button type="submit" class="btn btn-warning" name="confirm_processing" id="confirm_processing">Confirmar Processamento</button>
                                    <input type="hidden" name="repair_order_id" value="<?= $repair["repair_order_id"] ?>">
                                    <input type="hidden" name="user_id" value="<?= $repair["user_id"] ?>">
                                </form>
                            <?php } elseif ($repair["status"] === "PE") { ?>
                                <p style="margin-bottom: 10px; color:green;">PRONTO PARA ENTREGA</p>
                                <form action="/repairs_tech/" method="POST">
                                    <button type="submit" class="btn btn-success" name="confirm_delivery" id="confirm_delivery">Confirmar Entrega</button>
                                    <input type="hidden" name="repair_order_id" value="<?= $repair["repair_order_id"] ?>">
                                    <input type="hidden" name="user_id" value="<?= $repair["user_id"] ?>">
                                </form>
                            <?php } else { ?>
                                <p style="margin-bottom: 10px; color:green; font-weight:bold;"> REPARAÇÃO FINALIZADA </p>
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
