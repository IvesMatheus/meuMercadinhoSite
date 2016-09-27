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
        $href_login = "_telas/login.php";
        $a_login = "login";
        $produtos = "";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>meuMercadinho</title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="_css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href="_css/formulario.css"/>
    </head>
    <body>
        <div id="corpo">
            <header id="cabecalho">
                <figure>
                    <a href="index.php">
                        <img id="logo" src="_imagens/logo.png"; width="200px"/>
                    </a>
                    
                        <figcaption><i>meuMercadinho - suas compras em um click.</i></figcaption>

                </figure>
                <nav id="menu">
                    <ul>
                        <li><a href="index.php">home</a></li>
                        <li><a href="_telas/about.php">about</a></li>
                        <li><a href="_telas/contato.php">contato</a></li>
                        <li><a href="<?= $href_login ?>"><?= $a_login ?></a></li>
                        <?= $produtos ?>
                    </ul>
                </nav>
            </header>

            <div id="geral">
            <div id="informativo1">
                <h2>Consumidores</h2>

                <p>Em casa, no trabalho, na rua... com o meuMercadinho você faz as suas compras pelo celular, em qualquer lugar!<p>
                 <p>  meuMercadinho é o aplicativo que oferece conforto e facilidade nas suas compras. Com o meuMErcadinho você pode realizar suas compras em qualquer lugar. Basta baixar o aplicativo, escolher o mercadinho mais proximo de você, selecionar os produtos que você quer comprar e pronto!<p>
            </div>
            <!--
            <div id="imagemMeuMercadinho">
                    <img id="meuMercadinho" src="_imagens/img1.png" width="180%" height="50%" align="center">-->
            </div>
            <div id="informativo2">
            <h2>Mercados</h2>

                <p>O seu mercadinho virtual!

                Os seus produtos em uma loja virtual. no meuMercadinho você tem um espaço virtual, onde oferece os seus produtos pelo aplicativo. Você recebe a lista de pedidos e o endereço de entrega. É muito prático!
                Cadastre-se e encontre o pacote que oferece o que você procura.</p>

               <a href="_telas/contato.php">Entre em contato conosco!</a>
               </div> 

        </div>
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
    </body>
</html>
