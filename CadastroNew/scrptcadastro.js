function mostrarSenha()
{

    var senha = document.getElementById('senha')

    if (senha.type === 'password')
    {
        senha.setAttribute('type', 'text')
    }
    else
    {
        senha.setAttribute('type', 'password')
    }

}