<?php

    session_start();
    print_r($_SESSION);

    include_once('config.php');

    $senha = $_SESSION['senha'];
    $email = $_SESSION['email'];

    // Se não tiver login

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: Login/login.php');

        if (isset($_POST['submit_excluir']))
        {

        $sql = "SELECT * FROM cadastrar WHERE senha = '$senha' and email = '$email'";
        $reposta = $conexao->query($sql);

        echo "Deu certo! (Login) ";

        print_r($_SESSION);

        if(mysqli_num_rows($reposta) < 1)
        {
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            echo "Sai daqui";
        }

        }

    }

    // Mostrar sessão, se tiver login

    $log = $_SESSION['email'];

    // Excluir conta

    if (isset($_POST['submit_excluir']))
    {

    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    echo"Excluida com sucesso";

    $del = "DELETE FROM cadastrar WHERE senha = '$senha' AND email = '$email'";
    $reposta = mysqli_query($conexao, $del);

    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    header('Location: Login/login.php');

    }

    // Sair da conta

    if (isset($_POST['submit_sair']))
    {

    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    header('Location: Login/login.php');

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="principal.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Principal</title>
</head>
<body>

    <header>

        <input class="pesquisa" type="text">

    </header>

    <nav>


    </nav>


<div class="sapato-inicio">

    <div class="textoe">
        <p class="titulo-s">Nike Jordan Jumpman MVP</p>
        <p class="texts">Nós não inventamos o remix - mas considerando 
        o material que podemos amostrar, este é o que você precisa. 
        Acionamos o SP-12 e pegamos elementos do AJ6, 7 e 8, transformando-os
         em um calçado</p>
    </div>

    <div class="sapato">
        <img class="img-s" src="imagens/Jordan.png" alt="" height="700px"> 
    </div>

    <div class="textod">
        <p class="texts">Nós não inventamos o remix - mas considerando o material que podemos amostrar, este é o que você precisa. Acionamos o SP-12 
            e pegamos elementos do AJ6, 7 e 8, transformando-os
             em um calçado</p>
    </div>
</div>

</body>
</html>