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
                const changeInputs = document.querySelectorAll('input[name="changeQuantity"]');

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
                for(let input of changeInputs) {

                    input.addEventListener("change", () => {

                        const tr = input.parentNode.parentNode;
                        const product_id = tr.dataset.product_id;

                        fetch("/requests/", {
                            method: "POST",
                            headers: {
                                "Content-Type":"application/x-www-form-urlencoded"
                            },
                            body: `request=changeQuantity&quantity=${ input.value }&product_id=${ product_id }`
                        })
                        .then( response => response.json() )
                        .then( result => console.log(result) )
                        .catch( error => alert("Erro inesperado") ); /* controlar a possibilidade de erro*/
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
                if(empty($_SESSION["cartproduct"])){
                    echo '
                        <p>Carrinho vazio, por favor adicione algum artigo.</p>
                    ';
                }
            ?>
            
            <table class="table table-bordered mt-4">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Subtotal</th>
                    <th>Remover</th>
                </tr>
            
                <?php
        
                    $total = 0; 
            
                    foreach($_SESSION["cartproduct"] as $item){
            
                        $subtotal = $item["price"] * $item["quantity"]; 
                        $total = $total + $subtotal; 
            
                        $_SESSION["cartproduct_value"] = $total;

                        echo '
                            <tr data-product_id="' .$item["product_id"]. '">
                                <td>' .$item["name"]. '</td>
                                <td>
                                    <input
                                        type="number"
                                        name="changeQuantity"
                                        value="' .$item["quantity"]. '"
                                        min="1"
                                        max="' .$item["stock"]. '"
                                        aria-label="Alterar Quantidade"
                                    >
                                </td>
                                <td>' .$item["price"]. '€</td>
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
                <a class="btn btn-success" href="/checkout_products/">Finalizar a encomenda</a>
            </nav>
        </div>

        <?php require("templates/footer.php"); ?>
    </body>
</html>