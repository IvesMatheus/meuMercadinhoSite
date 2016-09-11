function filtrarImagens()
{
    categoria = document.getElementById("categoria").value;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            document.getElementById("imagens").innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("POST", "../_phps/filtrar_imagem.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("categoria=" + categoria);
}

function selecionar(tela)
{
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function()
    {
        if (xhttp.readyState == 4 && xhttp.status == 200)
        {
            tela.getElementById("img_produto").innerHTML = xhttp.responseText;
        }
    };

    xhttp.open("POST", "../_phps/teste.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    window.close();
}
