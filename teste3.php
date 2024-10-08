<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input name="email" type="text">
        <input name="senha" type="password">
        <button name="submit">Entrar</button>
    </form>
</body>
</html>

<?php

    include_once('config.php');

    if (isset($_POST['submit']))
    {

    if (!empty($_POST['email']) && !empty($_POST['senha']))
    {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    }
    else{
        $email = '';
        $senha = '';
    }

    $procura = "SELECT * FROM teste2 WHERE email = '$email' AND confirmado = 1";
    $resposta = $conexao->query($procura);

    if (mysqli_num_rows($resposta)>=1)
    {
        echo 'Você Fez login';
    }  
    else{
        echo 'Você não tem login';
    }

    }

?>