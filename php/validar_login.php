<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $cpf = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    try {
        $sql = "SELECT cpf, senha, tipo_usuario FROM cadastro_usuario WHERE cpf = :cpf";
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            $_SESSION['usuario_logado'] = $usuario['cpf'];
            $_SESSION['tipo_usuario'] = $usuario['tipo_usuario']; // ESSENCIAL
            $_SESSION['mensagem'] = "Login realizado com sucesso.";
            header("Location: ../index.php");
            exit;
        } else {
            $_SESSION['mensagem'] = "CPF ou senha incorretos.";
            header("Location: ../login.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro no login: " . $e->getMessage();
        header("Location: ../login.php");
        exit;
    }
} else {
    $_SESSION['mensagem'] = "Requisição inválida.";
    header("Location: ../login.php");
    exit;
}
?>
