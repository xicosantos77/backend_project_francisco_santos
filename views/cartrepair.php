<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/home/home.css">
        <title>Carrinho de produtos</title>
        <script>
            document.addEventListener("DOMContentLoaded", () => {

                const removeButtons = document.querySelectorAll('button[name="remove"]');

                for(let button of removeButtons) {

                    button.addEventListener("click", () => {

                        const tr = button.parentNode.parentNode;

                        fetch("/requests/", {
                            method: "POST",
                            headers: {
                                "Content-Type":"application/x-www-form-urlencoded"
                            },
                            body: "request=removeProduct&product_id=" + tr.dataset.product_id
                        })
                        .then( response => response.json())
                        .then( result => {
                            if(result.message && result.message === "OK") {
                                tr.remove();
                            }
                        });
                    });
                }
            });
        </script>
    </head>
    <body>

        <?php require("templates/header.php"); ?>

        <nav class="container-fluid header2">
            <ul class="nav row">
                <li class="nav-item col-6">
                    <?php
                        echo'
                            <a href="/products/"class="nav-link">MARCAS</a>
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
        
        <div class="container" style="margin-bottom: 100px;">   
            <h1 class="mt-4">Carrinho</h1>

            <?php
                if(empty($_SESSION["cartrepair"])){
                    echo '
                        <p>Carrinho vazio, por favor adicione algum artigo.</p>
                    ';
                }
            ?>
            
            <table class="table table-bordered mt-4">
                <tr>
                    <th>Produto</th>
                    <th>Reparação</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th>Remover</th>
                </tr>
            
                <?php
        
                    $total = 0; 
            
                    foreach($_SESSION["cartrepair"] as $repair){
            
                        $subtotal = $repair["price"] * $repair["quantity"]; 
                        $total = $total + $subtotal; 
            
                        echo '
                            <tr data-product_id="' .$repair["product_id"]. '">
                                <td>' .$repair["product_name"]. '</td>
                                <td> '.$repair["repair_name"].'</td>
                                <td>' .$repair["price"]. '€</td>
                                <td>' .$subtotal. '€</td>
                                <td>
                                    <button type="button" name="remove" aria-label="Remover Produto">X</button>
                                </td>
                            </tr>  
                        '; 
                    }
                ?>
                
                <tr>
                    <td colspan="3"></td>
                    <td colspan="2"><?= $total ?>€</td>
                </tr>
            
            </table>
            
            <nav class="mt-4">
                <a class="btn btn-primary" href="/products/">Escolher mais produtos</a>
                <a class="btn btn-success" href="/checkout/">Finalizar a encomenda</a>
            </nav>
        </div>

        <?php require("templates/footer.php"); ?>
    </body>
</html>