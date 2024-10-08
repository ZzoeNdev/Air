<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <button name="submit">Confirmar Cadastro</button>
    </form>
</body>
</html>

<?php

    include_once('config.php');

        if (isset($_POST['submit'])){

            if (isset($_GET['CaDaS'])) {
                $chave = $_GET['CaDaS'];
                echo $chave;
    
            }

            $teste = "SELECT * FROM cadastrar WHERE chave_de_acesso = '$chave' AND confirmado = 0";
            $resposta = $conexao->query($teste); 

            if (mysqli_num_rows($resposta) >= 1)
            {
                $sql = "UPDATE cadastrar SET confirmado = 1, chave_de_acesso = NULL WHERE chave_de_acesso = '$chave'";
                $troca = $conexao->query($sql);
            }else{
                echo "Chave inválida ou já utilizada!";
            }
            
            echo "Cadastro confirmado com sucesso!";
        } else {

        }


?>