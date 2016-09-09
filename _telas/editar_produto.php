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

        $produto = ProdutoDAO::listarPorId(new Produto($_SESSION["edt_prod"], '', '', '', '', '', '', '', '', ''));

        if($produto[0] != null &&  $produto[0]->getCategoria() != null)
        {
            $v_nome = $produto[0]->getNome();
            $v_quantidade = $produto[0]->getQuantidade();
            $v_peso = $produto[0]->getPeso();
            $v_preco = $produto[0]->getPreco();
            $v_validade = date('d/m/Y', $produto[0]->getValidade());
            $v_categoria = $produto[0]->getCategoria()->getId();
            $v_descricao = $produto[0]->getDescricao();
            $v_imagem = $produto[0]->getImagem()->getCaminho();

            $imagemDAO = new ImagemDAO();
            $_SESSION["imagens"] = array(0 => $produto[0]->getImagem());
            $_SESSION["imagem_atual"] = 0;
        }
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
                        <img id="logo" src="../_imagens/LOGO 01.png"; width="200px"/>
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
                    <li><a href="produtos.php">Produtos</a><li>
                    <li>&gt;</li>
                    <li>Editar Produto</li>
                </ul>
            </nav>
            <div id="formulario_edt">
                <form>
                    <figure id="img_produto">
                        <img id="imagem" src="../<?= $v_imagem ?>"/>
                        <figcaption>Adicionar imagem</figcaption>
                        <input type="button" value="L" class="btn" onclick="mudaFoto(-1)"/>
                        <input type="button" value="R" class="btn" onclick="mudaFoto(1)"/>
                    </figure>
                    <div id="inputs">
                        <label for="nome">Nome:</label><br>
                        <input id="nome" name="nome" type="text" class="txt_medio" value="<?= $v_nome ?>"/><br>
                        <label for="quantidade">Quantidade:</label><br>
                        <input id="quantidade" name="quantidade" type="number" min="1" class="txt_pequeno" value="<?= $v_quantidade ?>"/><br>
                        <label for="peso">Peso:</label><br>
                        <input id="peso" name="peso" type="text" class="txt_pequeno" placeholder="10 gm ou 10 kg" value="<?= $v_peso ?>"/><br>
                        <label for="preco">Preço:</label><br>
                        <input id="preco" name="preco" type="text" class="txt_pequeno" value="<?= $v_preco ?>"/><br>
                    </div>
                    <div id="r_inputs">
                        <label for="validade">Validade:</label><br>
                        <input id="validade" name="validade" type="date" class="txt_medio" value="<?= $v_validade ?>"/><br>
                        <label for="categoria">Categoria:</label><br>
                        <select id="categoria" name="categoria"  onchange="carregaFoto()">
                            <?php
                                $categoriaDAO = new CategoriaDAO();
                                $categorias = $categoriaDAO->listar();

                                foreach ($categorias as $key => $value)
                                {
                                    if($value->getId() == $v_categoria)
                                        $s = "selected='true'";
                                    else
                                        $s = "selected='false'";

                                    echo "<option value='".$value->getId()."' ".$s.">".$value->getNome()."</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <label for="descricao">Descrição:</label><br>
                        <textarea id="descricao" name="descricao" type="text" rows="5" cols="55"><?= $v_descricao ?></textarea><br>
                        <div id="op_form_edt">
                            <input id="btn_add" type="button" value="Alterar Produto" class="btn" onclick="editar()"/>
                            <input type="button" value="Cancelar" class="btn" onclick="cancelar()"/><br>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <footer id="rodape">
            &copy; Copyright 2016 - by RAIMAK<br>
            Facebook | Twitter
        </footer>
        <script language="javascript" src="../_js/editar_produto.js"></script>
    </body>
</html>