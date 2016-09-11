<?php
    include_once "../_model/Mercado.php";
    include_once "../_dao/ProdutoDAO.php";
    session_start();

    $mercado = null;
    if(isset($_SESSION["mercado"]))
        $mercado = $_SESSION["mercado"];

    if($mercado != null)
    {
        $href_login = "perfil.php";
        $a_login = "perfil";
        $li_produtos = "<li><a href='produtos.php'>produtos</a></li>";
    }
    else
    {
        /*
        $href_login = "login.php";
        $a_login = "login";
        $produtos = "";
        */

        header("Location: login.php");
    }

    function ocultarSenha($senha)
    {
        $aux = "";
        for($i = 0; $i < strlen($senha); $i++)
            $aux .= "*";

        return $aux;
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
                        <?= $li_produtos ?>
                    </ul>
                </nav>
            </header>
            <nav id="navegacao">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li>&gt;</li>
                    <li>Perfil</li>
                </ul>
            </nav>
            <header id="cabecalho_perfil">
                <figure>
                    <img src="" width="150px">
                    <figcaption>Imagem ilustrativa do <?= $mercado->getNome() ?></figcaption>
                </figure>
                <h1><?= $mercado->getNome() ?></h1>
            </header>
            <div id="info1">
                <div id="info_basica">
                    <h1>Informações básicas</h1>
                    <div>
                        <span class="lbl_info">Login<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getLogin() ?>
                        </span>
                    </div>
                    <div>
                        <span class="lbl_info">Senha<br></span>
                        <label id="senha" class="lbl_dado">
                            <?= ocultarSenha($mercado->getSenha()) ?>
                        </label>
                    </div>
                    <div>
                        <input id="mostraSenha" type="checkbox" onclick="mostrarSenha('<?= $mercado->getSenha() ?>')" />&nbsp;Mostrar senha
                    </div>
                    <div>
                        <span class="lbl_info">Código<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getCodigo() ?>
                        </span>
                    </div>
                </div>
                <div id="endereco">
                    <h1>Endereço</h1>
                    <div>
                        <span class="lbl_info">Rua<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getRua() ?>
                        </span>
                    </div>
                    <div>
                        <span class="lbl_info">Número<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getNumero() ?>
                        </span>
                    </div>
                    <div>
                        <span class="lbl_info">Bairro<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getBairro() ?>
                        </span>
                    </div>
                    <div>
                        <span class="lbl_info">Complemento<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getComplemento() ?>
                        </span>
                    </div>
                </div>
            </div>
            <div id="entrega">
                <?php
                    if($mercado->getServicoEntrega())
                    {
                        $h1 = "Seu mercado possui servico de entrega";
                        $id_div = "dados_servico_entrega";
                    }
                    else
                    {
                        $h1 = "Seu mercado não possui servico de entrega";
                        $id_div = "dados_sem_servico_entrega";
                    }
                ?>
                <h1><?= $h1 ?></h1>
                <div>
                    <span class="lbl_info">Hora abertura<br></span>
                    <span class="lbl_dado">
                        <?= $mercado->getHoraAbertura() ?>
                    </span>
                </div>
                <div>
                    <span class="lbl_info">Hora encerramento<br></span>
                    <span class="lbl_dado">
                        <?= $mercado->getHoraFechamento() ?>
                    </span>
                </div>
                <div id="<?= $id_div ?>">
                    <div>
                        <span class="lbl_info">Taxa de entrega<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getTaxaEntrega() ?>
                        </span>
                    </div>
                    <div>
                        <span class="lbl_info">Valo mínimo de compra<br></span>
                        <span class="lbl_dado">
                            <?= $mercado->getVmc() ?>
                        </span>
                    </div>
                </div>
            </div>
            <div id="opcoes">
                <input type="button" value="Editar perfil" class="btn"/>
                <input type="button" value="Visualizar mapa" class="btn" onclick="mapa()"/>
                <input type="button" value="Logout" class="btn" onclick="logout()"/>
            </div>
            <br>
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
        <script language="javascript" src="../_js/perfil.js"></script>
    </body>
</html>
