btnCancelar = document.getElementById("btnCancelar");
btnCancelar.onclick = function ()
{
    window.location = "../_telas/mercado.php";
}

function mostraSenha(senha)
{
    var chkSenha = document.getElementById("senha");
    var txtSenha = document.getElementById("txtSenha");

    if(chkSenha.checked)
        txtSenha.placeholder = senha;
    else
    {
        var aux = "";
        for(i = 0; i < senha.length; i++)
            aux += "*";

        txtSenha.placeholder = aux;
    }
}
