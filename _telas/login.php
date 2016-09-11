<?php
    include_once "../_model/Mercado.php";
    session_start();

    $mercado = null;
    if(isset($_SESSION["mercado"]))
        $mercado = $_SESSION["mercado"];

    if($mercado != null)
    {
        $href_login = "perfil.php";
        $a_login = "perfil";
        $produtos = "<li><a href='produtos.php'>produtos</a></li>";
    }
    else
    {
        $href_login = "login.php";
        $a_login = "login";
        $produtos = "";

        //header("Location: login.php");
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
                    <a href="../index.php">
                        <img id="logo" src="../_imagens/logo.png"; width="200px"/>
                    </a>
                    <figcaption>Logo do meuMercadinho</figcaption>
                </figure>
                <nav id="menu">
                    <ul>
                        <li><a href="../index.php">home</a></li>
                        <li><a href="<?= $href_login ?>"><?= $a_login ?></a></li>
                        <?= $produtos ?>
                    </ul>
                </nav>
            </header>
            <nav id="navegacao">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li>&gt;</li>
                    <li>Login</li>
                </ul>
            </nav>
            <div id="login">
                <form name="efetua_login" method="POST" action="../_phps/verificaLogin.php">
                    <div id="nome">
                        <label for="login" class="lbl">Login</label><br>
                        <input name="login" type="text" class="txt_grande"/><br>
                    </div>
                    <div id="senha">
                        <label for="senha" class="lbl">Senha</label><br>
                        <input name="senha" type="password" class="txt_grande"/><br>
                    </div>
                    <div id="entrar">
                        <input name="entrar" type="submit" value="Entrar" class="btn"/>
                    </div>
                </form>
            </div>
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
    </body>
</html>
