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
                        <li><a href="index.php">contato</a></li>
                        <li><a href="<?= $href_login ?>"><?= $a_login ?></a></li>
                        <?= $produtos ?>
                    </ul>
                </nav>
            </header>

            <div id="sobre1">
                <h2>Sobre o meuMercadinho</h2>

                <p>O meuMercadinho é um aplicativo que tem como objetivo facilitar a logística de venda dos mercadinhos, onde cliente e mercado ganhem. O cliente é beneficiado com a comodidade, facilidade, segurança e rapidez ao realizar suas compras, e o mercadinho é beneficiado com facilidade em receber a lista de produtos e o endereço, além do interesse dos clientes em comprar em seu estabelecimento. </p>




            </div>
            <div id="sobre2">
                
               <h2> Sobre a RAIMAK:</h2>

        <p>A RAIMAK é uma empresa de desenvolvimento de software que busca oferecer soluções inovadoras e significativas para a sociedade.

        A missão da RAIMAK é desenvolver produtos acessíveis, com exclusividade e qualidade, atendendo aos mercadinhos de vizinhança, proporcionando conforto e comodidade aos seus clientes.</p>
            </div>
                
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
    </body>
</html>
