<?php
    include_once "_model/Mercado.php";
    session_start();

    $mercado = null;
    if(isset($_SESSION["mercado"]))
        $mercado = $_SESSION["mercado"];

    if($mercado != null)
    {
        $href_login = "_telas/perfil.php";
        $a_login = "perfil";
        $produtos = "<li><a href='_telas/produtos.php'>produtos</a></li>";
    }
    else
    {
        $href_login = "login.php";
        $a_login = "login";
        $produtos = "";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>meuMercadinho</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="../_css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href="../_css/formulario.css"/>
    </head>
    <body>
        <div id="corpo">
            <header id="cabecalho">
                <figure>
                    <a href="index.php">
                        <img id="logo" src="../_imagens/logo.png"; width="200px"/>
                    </a>
                    
                        <figcaption><i>meuMercadinho - suas compras em um click.</i></figcaption>

                </figure>
                <nav id="menu">
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="about.php">about</a></li>
                        <li><a href="contato.php">contato</a></li>
                        <li><a href="<?= $href_login ?>"><?= $a_login ?></a></li>
                        <?= $produtos ?>
                    </ul>
                </nav>
            </header>

            
            <div id="informativo1">
             <h2>Cadastre seu Mercadinho</h2>
            <p style="text-align:justify">Entre em contato conosco para cadastrar seu mercadinho. Após o cadastro, lhe enviaremos as instruções para habilitar seu mercadinho. Sinta-se à vontade. Nos ligue ou mande email.</p>

            <p>
            (11) 9275-7552</p>
            <p>contato@raimak.com.br</p>
                
            </div>
            
             

        
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
    </body>
</html>
