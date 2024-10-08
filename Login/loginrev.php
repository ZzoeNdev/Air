<?php

session_start();
include_once('../config.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>

        <header>

            <div>
                <img src="../imagens/Logo.png" alt="" height="100px">
            </div>

            <div>
                <a href="../Cadastro/index.php"><button class="cadastro">Não tem cadastro?</button></a>
            </div>

        </header>

    <form method="POST">

        <div class="forms">

        <label class="login-l">Login</label>
        <br>
        <label class="ins">Insira suas credencias</label>
        <br><br><br>
        <label class="email">Email/CPF:</label>
        <br>
        <input class="text" type="text" name="email" placeholder="Seu email">
        <br><br>
        <label class="senha">Senha:</label>
        <br>
        <input class="text" type="password" name="senha" placeholder="Sua senha">
        <br><br>
        <?php

        include_once('../config.php');

        //Se não tiver nada
        
        if (isset($_POST['submit']) && empty($_POST['email']) && empty($_POST['senha']))
            {
                echo '<p style = "color: red; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
                print_r("Preencha os campos!");
                echo '</p>';
        
            }

        //Efetuar login

        $senha = 'a';
        $email = 'a';


        if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
        {

        $senha = $_POST['senha'];
        $email = $_POST['email'];

        $sql = "SELECT * FROM cadastrar WHERE senha = '$senha' AND email = '$email' AND confirmado = 1";
        $resposta = $conexao->query($sql);


        if(mysqli_num_rows($resposta) < 1)
        {
            unset($_POST['email']);
            unset($_POST['senha']);
            echo '<p style = "color: red; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
            print_r("Email / senha invalidos");
            echo '<br>';
            print_r("ou não efetuou a confirmação da conta");
            echo '</p>';
        }

        else
        {
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: ../as.php');
        }


        }

        // Exclusão de conta

            if (!empty($_POST['email']) && !empty($_POST['senha'])) 
            {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            }

            $sql = "SELECT * FROM cadastrar WHERE senha = '$senha' and email = '$email'";
            $reposta = $conexao->query($sql);

            if(mysqli_num_rows($reposta) < 1 && isset($_POST['submit_excluir']))
            {
                echo '<p style = "color: red; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
                print_r("Erro ao excluir (Conta inexistente)");
                echo '</p>';
            }

            else{

                if(isset($_POST['submit_excluir']))
                {
                echo '<p style = "color: green; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
                print_r("Excluida com sucesso");
                echo '</p>';
            
                $del = "DELETE FROM cadastrar WHERE senha = '$senha' AND email = '$email'";
                $reposta = $conexao->query($del);
        
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                }

            }

            // Inserir conta teste

            if (isset($_POST['submit_conta']))
            {
                
                $conta = mysqli_query($conexao, "INSERT INTO cadastrar(email,senha) VALUES ('teste','t')");
                echo '<p style = "color: green; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">';
                print_r("Conta ('teste') criada!");
                echo '</p>';
        
            }


        ?>
        <input class="button" type="submit" name="submit" value="Entrar">
        <br><br>
        <input class="button-ex" type="submit" name="submit_excluir" value="Excluir conta">
        <input class="button-ex" type="submit" name="submit_conta" value="Conta Teste">
        <br><br>

        <div>
    </form>
</body>
</html>