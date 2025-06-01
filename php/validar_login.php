<?php
session_start();
include('conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $Senha = $_POST['senha'];

    $sql = "SELECT cpf, senha, tipo_usuario FROM cadastro_usuario WHERE cpf = :cpf";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':cpf', $usuario);
    $stmt->execute();

    $usuarioBanco = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuarioBanco && password_verify($Senha, $usuarioBanco['senha'])) {
        $_SESSION['usuario_logado'] = $usuarioBanco['cpf'];
        $_SESSION['tipo_usuario'] = $usuarioBanco['tipo_usuario']; // salva o tipo de usuário na sessão
        $_SESSION['mensagem'] = "Login realizado com sucesso!";
        header("Location: ../index.php"); // redireciona para um index dinâmico em PHP
        exit;
    } else {
        $_SESSION['mensagem'] = "CPF ou senha incorretos.";
        header("Location: ../login.php");
        exit;
    }
}
?>
