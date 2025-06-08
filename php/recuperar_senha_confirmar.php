<?php
session_start();
include("conexao.php");

// Verifica o método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoDigitado = $_POST['codigo_digitado'] ?? '';
    $novaSenha = $_POST['nova_senha'] ?? '';

    // Verificar se o código está correto
    if (!isset($_SESSION['codigo_recuperacao']) || $codigoDigitado != $_SESSION['codigo_recuperacao']) {
        $_SESSION['mensagem'] = "Código inválido. Tente novamente.";
    } elseif (empty($novaSenha)) {
        $_SESSION['mensagem'] = "Informe a nova senha.";
    } else {
        // Criptografando a senha
        $senha_hash = password_hash($novaSenha, PASSWORD_DEFAULT);

        // Atualizando a senha no banco de dados
        $email = $_SESSION['email_recuperacao'];
        $stmt = $conexao->prepare('UPDATE cadastro_usuario set senha = :senha WHERE email = :email');
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Senha atualizada com sucesso!";
            // Limpa o código da sessão
            unset($_SESSION['codigo_recuperacao']);
            unset($_session['email_recuperacao']);

            header("Location: ../login.php"); // Redirecionar para o login
            exit;
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar a senha. Tente novamente.";
        }

    }

}


// HEAD e BODY do HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECUPERAR SENHA</title>
    <link rel="stylesheet" href="../style/style.css">
    <script async src="../scrypt/code.js"></script>
</head>
<body class="recuperar-senha">

    <?php
    if (isset($_SESSION['mensagem'])) {
        echo "<script>alert('" . addslashes($_SESSION['mensagem']) . "');</script>";
        unset($_SESSION['mensagem']);
    }
    ?>
    
    <main>

        <div class="background-recuperar-senha">

            <h1>
                Crie uma nova senha
            </h1>
            <form method="POST" >
                <div>
                    <div>
                        <label for="">Código de Verificação</label>
                        <input type="text" name="codigo_digitado" placeholder="Digite o código enviado para o seu e-mail" required >
                        
                        <label for="">Nova Senha</label>
                        <input type="text" name="nova_senha" placeholder="Digite sua nova senha" required >
                    </div>
                    

                    <div class="recuperar">
                        <a href="index.html" class="btn_link"><button class="btn_link" type="submit">Criar senha</button></a>
                    </div>
                </div>
            </form>
        </div>

    </main>