<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Add your custom CSS -->
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO Repair</title>
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
                        <a href="/products/"class="nav-link">PRODUTOS</a>
                    ';
                ?>
            </li>
        </ul>
    </nav>

    <main>
        <section class="img">
            <img src="../images/index/promo_img.jpg" alt="Promo Image"  class="img-fluid">
        </section>
        <section class="stats p-4">
            <div class="container-xxl">
                <ul class="nav row">
                    <li class="nav-item col fw-bold">ENTREGAS EM 2h E 24h</li>
                    <li class="nav-item col fw-bold">PORTES GRÁTIS</li>
                    <li class="nav-item col fw-bold">45 LOJAS EM PORTUGAL</li>
                    <li class="nav-item col fw-bold">GARANTIA VITALICIA</li>
                    <li class="nav-item col fw-bold">ASSISTÊNCIA TÉCNICA</li>
                </ul>
            </div>
        </section>
        <section class="products">
            <div class="container">
                <h3>Produtos</h3>
                <div class="row">
                    <div class="col-3">
                        <a href="">
                            <img src="../images/index/capas.jpeg" alt="" class="img-fluid">
                            <p class="nav-item">Capas</p>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="">
                            <img src="../images/index/cabos.jpg" alt="" class="img-fluid">
                            <p>Cabos</p>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="">
                            <img src="../images/index/peliculas.webp" alt="" class="img-fluid">
                            <p>Películas</p>
                        </a>
                    </div>
                    <div class="col-3">
                        <a href="">
                            <img src="../images/index/smartwatches.webp" alt="" class="img-fluid">
                            <p>Smartwatches</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="services">
            <h3>Serviços</h3>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <a href="">
                            <img src="../images/icons/reparacoes.png" alt="" class="img-fluid">
                            <p>Reparações</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="">
                            <img src="../images/icons/acessorios.png" alt="" class="img-fluid">
                            <p>Acessórios</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="">
                            <img src="../images/icons/recondicionados.png" alt="" class="img-fluid">
                            <p>Recondicionados</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="">
                            <img src="../images/icons/orcamentos.png" alt="" class="img-fluid">
                            <p>Orçamentos</p>
                        </a>
                    </div>
                    <div class="col">
                        <a href="">
                            <img src="../images/icons/contactos.png" alt="" class="img-fluid">
                            <p>Contactos</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="newsletter">
            <div class="container">
                <h3>Subscreva a nossa newsletter</h3>
                <div class="">
                    <div class="subs-form d-flex align-items-center justify-content-center">
                        <form action="" class="p-5 row">
                            <input class="form-control mb-3" type="text" placeholder="O seu nome">
                            <input class="form-control mb-3" type="email" placeholder="O seu email">
                            <button class="btn btn-secondary mb-3" type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php require("templates/footer.php"); ?>
</body>
</html>
