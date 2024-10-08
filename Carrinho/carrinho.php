<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="carrinho.css">
    <title>Carrinho de Compras</title>
</head>
<body>
    
    <header>
        <h1>Carrinho</h1>
    </header>

    <main>

        <div class="lista">       

        <?php

        $produtos = array(['nome' => 'Hack Valorant','imagem' => '../imagens/vava.jpg' , 'valor' => '1000'],
            ['nome' => 'Hack Fortnite','imagem' => '../imagens/fort.jpg' , 'valor' => '900']
            );

            foreach ($produtos as $id => $valor) {
        ?>

                <div class="produto">

                    <img src="<?php echo $valor['imagem']?>" alt="">
                    <p><?php echo $valor['nome']?></p>
                    <p>R$ <?php echo $valor['valor']?></p>
                    <a href="?colocar=<?php echo $id ?>">
                        <button class="button-produto">Colocar no carrinho</button>
                    </a>
                    <a href="?retirar=<?php echo $id ?>">Tirar</a>

                </div>

        <?php
            }
        ?>

        </div>

        <?php

            if (isset($_GET['colocar']))
            {
                
                $idproduto = $_GET['colocar'];
                
                if ($produtos[$idproduto]) {

                    if (isset($_SESSION['carrinho'][$idproduto]))
                    {
                        $_SESSION['carrinho'][$idproduto]['quantidade']++;
                    }
                    else
                    {
                        $_SESSION['carrinho'][$idproduto] = array ('quantidade' => 1, 'nome' => $produtos[$idproduto]['nome'], 'valor' => $produtos[$idproduto]['valor'] );
                    }
                }

                else
                {
                    die('Não existe pae');
                }

            }

            if (isset($_GET['retirar']))
            {
                
                $idproduto = $_GET['retirar'];
                
                if ($produtos[$idproduto]) {

                    if (isset($_SESSION['carrinho'][$idproduto]))
                    {
                        $_SESSION['carrinho'][$idproduto]['quantidade']--;
                    }     
                }
            }

            foreach ($_SESSION['carrinho'] as $id => $valor) 
            {
?>

                <?php echo '<p>Nome: '.$valor['nome'].' | Qtd: '.$valor['quantidade'].' | Valor: '.$valor['valor'] * $valor['quantidade'].'</p>';?> <a href="?retirar=<?php echo $id ?>">Tirar</a>
                <?php echo '<br>'; ?>

                <?php
            }

            ?>
    </main>

</body>
</html>