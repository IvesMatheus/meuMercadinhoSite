<?php
    include_once "../_model/Imagem.php";
    session_start();

    $caminho = '../';
    if(isset($_SESSION["imagens"]))
    {
        if($_SESSION["imagens"][0] != null)
        {
            $imagens = $_SESSION["imagens"];

            if(isset($imagens[$_SESSION["imagem_atual"] + $_POST["op"]]))
            {
                $caminho .= trim($imagens[$_SESSION["imagem_atual"] + $_POST["op"]]->getCaminho());
                $_SESSION["imagem_atual"]++;
            }
            else
            {
                $caminho .= trim($imagens[($_POST["op"] == 1? 0 : count($imagens) - 1)]->getCaminho());
                $_SESSION["imagem_atual"] = ($_POST["op"] == 1? 0 : count($imagens) - 1);
            }
        }
    }

    echo "<img id='imagem' src='".$caminho."'/>
        <figcaption>Adicionar imagem</figcaption>
        <input type='button' value='L' class='btn' onclick='mudaFoto(-1)'/>
        <input type='button' value='R' class='btn' onclick='mudaFoto(1)'/>";
?>