<?php
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
                    <li><a href="perfil.php">Perfil</a></li>
                    <li>&gt;</li>
                    <li>Editar Perfil</li>
                </ul>
            </nav>
            <header id="cabecalho_perfil">
                <figure>
                    <img src="" width="150px">
                    <figcaption>Imagem ilustrativa do <?= $mercado->getNome() ?></figcaption>
                </figure>
                <span class="lbl_info">Login<br></span>
                <input id="nome" type="text" class="txt_medio" value="<?= $mercado->getNome() ?>" />
            </header>
            <div id="info1">
                <div id="info_basica">
                    <h1>Informações básicas</h1>
                    <div>
                        <span class="lbl_info">Login<br></span>
                        <input id="login" type="text" class="txt_medio" value="<?= $mercado->getLogin() ?>" />
                    </div>
                    <div>
                        <span class="lbl_info">Senha<br></span>
                        <input id="senha" type="password" class="txt_medio" value="<?= ocultarSenha($mercado->getSenha()) ?>" />
                    </div>
                    <div>
                        <input id="mostraSenha" type="checkbox" onclick="mostrarSenha('<?= $mercado->getSenha() ?>')" />&nbsp;Mostrar senha
                    </div>
                    <div>
                        <span class="lbl_info">Código<br></span>
                        <input id="codigo" type="text" class="txt_medio" value="<?= $mercado->getCodigo() ?>" />
                    </div>
                </div>
                <div id="endereco">
                    <h1>Endereço</h1>
                    <div>
                        <span class="lbl_info">Rua<br></span>
                        <input id="rua" type="text" class="txt_grande" value="<?= $mercado->getRua() ?>" />
                    </div>
                    <div>
                        <span class="lbl_info">Número<br></span>
                        <input id="numero" type="text" class="txt_pequeno" value="<?= $mercado->getNumero() ?>" />
                    </div>
                    <div>
                        <span class="lbl_info">Bairro<br></span>
                        <input id="bairro" type="text" class="txt_medio" value="<?= $mercado->getBairro() ?>" />
                    </div>
                    <div>
                        <span class="lbl_info">Complemento<br></span>
                        <input id="complemento" type="text" class="txt_grande" value="<?= $mercado->getComplemento() ?>" />
                    </div>
                </div>
            </div>
            <div id="entrega">
                <?php
                    if($mercado->getServicoEntrega())
                    {
                        $s = "checked";
                        $id_div = "dados_servico_entrega";
                    }
                    else
                    {
                        $s = "";
                        $id_div = "dados_sem_servico_entrega";
                    }
                ?>
                <div class="center">
                    <input id="servico_entrega" type="checkbox" onclick="servicoEntrega()"  <?= $s ?>/>
                    &nbsp;<span class="lbl_grande">Serviço de Entrega</span>
                </div>
                <div>
                    <span class="lbl_info">Hora abertura<br></span>
                    <input id="hora_abertura" type="number" min="0" class="txt_pequeno" value="<?= $mercado->getHoraAbertura() ?>" />
                </div>
                <div>
                    <span class="lbl_info">Hora encerramento<br></span>
                    <input id="hora_encerramento" type="number" min="0" class="txt_pequeno" value="<?= $mercado->getHoraFechamento() ?>" />
                </div>
                <div id="<?= $id_div ?>">
                    <div>
                        <span class="lbl_info">Taxa de entrega<br></span>
                        <input id="taxa_entrega" type="text" class="txt_pequeno" value="<?= $mercado->getTaxaEntrega() ?>" />
                    </div>
                    <div>
                        <span class="lbl_info">Valo mínimo de compra<br></span>
                        <input id="vmc" type="text" class="txt_pequeno" value="<?= $mercado->getVmc() ?>" />
                    </div>
                </div>
            </div>
            <div id="opcoes">
                <input type="button" value="Salvar Alterações" class="btn" onclick="salvar()"/>
                <input type="button" value="Cancelar" class="btn" onclick="cancelar()"/>
            </div>
            <br>
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
        <script language="javascript" src="../_js/editar_perfil.js"></script>
    </body>
</html>
