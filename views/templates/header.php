<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <h1>T E L L O</h1>
            </div>
            <div class="col-9 d-flex align-items-center justify-content-end">
                <div class="row">
                    <div class="col-6">
                        <input class="form-control" type="text" placeholder="Pesquisar">
                    </div>
                    <div class="col-2">
                        <button class="btn btn-dark" type="button" id="search-button">Search</button>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-secondary"><a href="/contact/">Contact</a></button>
                    </div>
<?php
                    if( isset($_SESSION["user_id"])||isset($_SESSION["admin_id"])|| isset($_SESSION["tech_id"])){
?>
                    <div class="col-2">
                        <button class="btn btn-secondary"><a href="/logout/">Logout</a></button>
                    </div>
<?php } else { ?>
                    <div class="col-2">
                        <button class="btn btn-secondary"><a href="/login/">Login</a></button>
                    </div>
<?php } ?>
                </div>
            </div>
        
<?php if( isset($_SESSION["user_id"])){ ?>
            <div class="col-2 justify-content-end">
                <p>Bem vindo, <?php print_r($_SESSION["user_name"])?>!</p>
            </div>
            <div class="col-12 justify-content-start" style="margin-bottom:10px;">
                <a href="/user_interface/" class="btn btn-secondary">Menu de utilizador</a>
            </div>
            <div class="col-12 justify-content-start" style="margin-bottom:20px;">
                <a href="/" class="btn btn-secondary">Página principal</a>
            </div>

            <?php if( isset($_SESSION["cartproduct_value"])){ ?>
                
                <div>
                    <p><a href="/cartproduct/">Carrinho de produtos:</a> <?php print_r($_SESSION["cartproduct_value"])?> €</p>        
                </div>
            
            <?php } ?>    

            <?php if( isset($_SESSION["cartrepair_value"])){ ?>  
                
                <div>
                    <p><a href="/cartrepair/">Carrinho de reparações:</a> <?php print_r($_SESSION["cartrepair_value"])?> €</p>                
                </div>
            
            <?php } ?> 
<div>
                    
                </div>

<?php } else if ( isset($_SESSION["admin_id"])){ ?>
            <div class="justify-content-end">
                <p>Bem vindo administrador, <?php print_r($_SESSION["admin_name"])?>!</p>
            </div>
            <div class="col-12 justify-content-start" style="margin-bottom:10px;">
                <a href="/admin_interface/" class="btn btn-secondary">Menu de administrador</a>
            </div>
            <div class="col-12 justify-content-start" style="margin-bottom:20px;">
                <a href="/" class="btn btn-secondary">Página principal</a>
            </div>
<?php } else if ( isset($_SESSION["tech_id"])){ ?>
            <div class="justify-content-end">
                <p>Bem vindo técnico, <?php print_r($_SESSION["tech_name"])?>!</p>
            </div>
            <div class="col-12 justify-content-start" style="margin-bottom:10px;">
                <a href="/tech_interface/" class="btn btn-secondary">Menu de técnico</a>
            </div>
            <div class="col-12 justify-content-start" style="margin-bottom:20px;">
                <a href="/" class="btn btn-secondary">Página principal</a>
            </div>
<?php } else { ?>
            <div class="justify-content-end">
                <p>Bem vindo, visitante! Faça <a href="/login/">login</a> ou <a href="/register/">registe-se</a> para usufruir da melhor loja de tecnologia do país!</p>
            </div>
        </div>
    </div>
    
<?php } ?>           

</header>