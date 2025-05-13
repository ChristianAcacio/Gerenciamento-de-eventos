<?php
include("conexao.php");
// Requer o autoloader do Composer, acessando a pasta vendor. OBS: Verificar o diretório.
require '../vendor/autoload.php';
// Inclui a biblioteca PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Função recebe os parâmetros 
function enviarEmail($destinatario, $assunto, $mensagem) {
    $mail = new PHPMailer(true);

    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'culturahiveautomatico@gmail.com'; // Email
        $mail->Password = 'rxmt nren ilte wydw'; // Senha
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom('culturahiveautomatico@gmail.com', 'Cultura Hive');
        $mail->addAddress($destinatario);

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = $assunto;
        $mail->Body = $mensagem;

        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Erro ao enviar o e-mail: {$mail->ErrorInfo}";
        return false;
    }

}