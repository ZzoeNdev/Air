<?php

session_start();

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
{

    $senha = $_POST['senha'];
    $email = $_POST['email'];

    include_once('config.php');

    $sql = "SELECT * FROM cadastrar WHERE senha = '$senha' and email = '$email'";
    $reposta = $conexao->query($sql);

    print_r($_SESSION);

    if(mysqli_num_rows($reposta) < 1)
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        echo "Não existe pcr";
    }

    else
    {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        echo  "Existe pcr";
        header('Location: as.php');
    }

}
else
{
    
    header('Location: loginrev.php');

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">

        <label for="">Login</label>
        <br>
        <input type="text" name="email" placeholder="Seu email">
        <br>
        <input type="password" name="senha" placeholder="Sua senha">
        <br>
        <input type="submit" name="submit">

    </form>
</body>
</html>