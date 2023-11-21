<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/home/home.css">
    <title>TELLO - Contacto</title>
</head>
<body class="d-flex flex-column min-vh-100">

    <?php require("templates/header.php"); ?>

    <nav class="container-fluid header2">
        <ul class="nav row">
            <li class="nav-item col-6">
                <?php
                    echo'
                        <a href="/repairs/" class="nav-link">REPARAÇÕES</a>
                    ';
                ?>
            </li>
            <li class="nav-item col-6">
                <?php
                    echo'
                        <a href="/" class="nav-link">HOME</a>
                    ';
                ?>
            </li>
        </ul>
    </nav>

    <div class="container d-flex flex-column align-items-center justify-content-center" style="margin-bottom: 250px;">
        <h1  class="mt-5">Os nossos contactos:</h1>
        <h4 style="margin-bottom: 20px" class="mt-2">Email:</h4>
        <p style="margin-bottom: 20px">tello@tello.com</p>
        <h4 style="margin-bottom: 20px">Contacto telefónico:</h4>
        <p style="margin-bottom: 20px">91 345 67 89 / 21 987 65 43</p>
        <h4 style="margin-bottom: 40px">A nossa localização:</h4>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3111.8515282173835!2d-9.150794823523217!3d38.74416915572992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd1933011b4ba457%3A0x2c31a6586d1bc819!2sRumos%20Training!5e0!3m2!1spt-PT!2spt!4v1700408324789!5m2!1spt-PT!2spt" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <?php require("templates/footer.php"); ?>

</body>
</html>
