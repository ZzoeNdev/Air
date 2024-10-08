<?php
session_start();

// Carrega o autoloader do Composer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $mail->setFrom('enzzo.zre@gmail.com', 'Enzzo');
    $mail->addAddress($email_cpf, 'Enzzo G'); // Adicionar um destinatário

    // Conteúdo do E-mail
    $mail->isHTML(true);                                        // Definir o formato do e-mail para HTML
    $mail->Subject = 'Assunto do E-mail';
    $mail->Body    = 'Este é o <b>corpo</b> do e-mail em <i>HTML</i>.';
    $mail->AltBody = 'Este é o corpo do e-mail em texto simples para clientes de e-mail que não suportam HTML.';

    $mail->send();
    echo 'E-mail enviado com sucesso!';
} catch (Exception $e) {
    echo "O e-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}";
}
?>
