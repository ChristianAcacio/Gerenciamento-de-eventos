<?php
session_start();
include("conexao.php");


// Verificar método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    if (!$email) {
        $_SESSION['mensagem'] = "E-mail inválido!";
        header("Location: recuperar_senha.php");
        exit;
    }

    // Conecte ao banco
    $stmt = $conexao->prepare("SELECT * FROM cadastro_usuario WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    if ($stmt->rowCount() === 0) {
        $_SESSION['mensagem'] = "E-mail não encontrado!";
        header("Location: ../php/recuperar_senha.php");
        exit;
    } 
    if ($stmt->rowCount() !== 0) {
        // Envia o e-mail
        include("enviar_email.php");

        $destinatario = $_POST['email'];
        $assunto = "Recuperacao de senha";
        $codigo = rand(100000, 999999);

        $_SESSION['codigo_recuperacao'] = $codigo;
        $_SESSION['email_recuperacao'] = $email;

        $mensagem = "<h1>Seu código de confirmação para recuperação de senha.</h1>
        <p>$codigo</p>
        <p>Obrigado por utilizar o Cultura Hive!</p>";

        if (enviarEmail($destinatario, $assunto, $mensagem)) {
            $_SESSION['mensagem'] = "Código enviado com sucesso para seu e-mail!";
        } else {
            $_SESSION['mensagem'] = "Erro ao enviar o e-mail.";
        }

        header("Location: recuperar_senha_confirmar.php");
        exit;
    } else {
        // Email não encontrado
        $_SESSION['mensagem'] = "E-mail não encontrado!";
        header("Location: recuperar_senha.php");
        exit;
    }

   

} else {
    header("Location: recuperar_senha_confirmar.php");
    exit;
}