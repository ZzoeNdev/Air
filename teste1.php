<?php
    include_once('config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $senha = 123;

    if(!empty($_POST['email']))
    {
        $email = $_POST['email'];
    }else{
        $email = '';
    }

    //Criação de chave unica

    $chave_de_acesso = uniqid(rand(),true);
    $link = "localhost/layout/teste2.php?CaDaS=". $chave_de_acesso;   
    $confirmado = 0;      

    if (isset($_POST['submit']))
    {

            $_SESSION['teste']['email'] = $email;

            $resposta = mysqli_query($conexao, "INSERT INTO teste2(email,senha,chave,confirmado) VALUES('$email',$senha,'$chave_de_acesso','$confirmado')");

            echo '<p style = "color: green; font-family: Arial, Helvetica, sans-serif; font-size: 13px; text-align: center;">';
            print_r("Conta criada com sucesso!");


            //Enviar email de confirmação

            // Carrega o autoloader do Composer
            require 'vendor/autoload.php';

            // Cria uma nova instância do PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Configurações do servidor
                $mail->SMTPDebug = 0;                                       // Desativar saída de debug
                $mail->isSMTP();                                            // Usar SMTP
                $mail->Host       = 'smtp.gmail.com';                 // Servidor SMTP
                $mail->SMTPAuth   = true;                                   // Habilitar autenticação SMTP
                $mail->Username   = 'enzzo.zre@gmail.com';             // Usuário SMTP
                $mail->Password   = 'zevv azab sgyl nmnr';                             // Senha SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Tipo de encriptação
                $mail->Port       = 587;                                    // Porta SMTP

                // Destinatários
                $mail->setFrom('enzzo.zre@gmail.com', 'Air');
                $mail->addAddress($email, 'Enzzo G'); // Adicionar um destinatário

                // Conteúdo do E-mail
                $mail->isHTML(true);                                        // Definir o formato do e-mail para HTML
                $mail->Subject = 'Confirmar seu Cadastro no Air';
                $mail->Body    = "
                <html>
                    <body>
                        <p>Clique no link abaixo para <b>confirmar seu login!</b></p>
                        <a href='$link'>Confirmar Cadastro</a>
                        <br><br>
                        <p>Se esse email chegou para você por engano, apenas ignore</p>
                    </body>
                </html>
                ";
                $mail->AltBody = 'Este é o corpo do e-mail em texto simples para clientes de e-mail que não suportam HTML.';

                $mail->send();
                echo 'E-mail enviado com sucesso!';
            } catch (Exception $e) {
                echo "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}";
            }


            if (isset($_POST['submit']))
            {
                $_SESSION['teste']['email'] = $email;

                $resposta = mysqli_query($conexao, "INSERT INTO cadastrar(email) VALUES('$email')");
            }
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
        <input name="email" type="text">
        <input name="submit" type="submit">
    </form>
</body>
</html>