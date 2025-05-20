<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST['cpf'];
    $nome = $_POST['Nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data'];
    $genero = $_POST['genero'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['Bairro'];
    $estado = $_POST['Estado'];

    // Criptografando a senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Monta a query com placeholders
    $sql = "INSERT INTO cadastro_usuario (cpf, nome, email, nascimento, genero, cep, cidade, bairro, uf, senha)
            VALUES (:cpf, :nome, :email, :nascimento, :genero, :cep, :cidade, :bairro, :uf, :senha)";

    // Prepara a query
    $stmt = $conexao->prepare($sql);

    // Associa os parâmetros
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nascimento', $data_nascimento);
    $stmt->bindParam(':genero', $genero);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':cidade', $cidade);
    $stmt->bindParam(':bairro', $bairro);
    $stmt->bindParam(':uf', $estado);
    $stmt->bindParam(':senha', $senha_hash);

    // Executa e verifica
    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Usuário cadastrado com sucesso!";
    } else {
        $_SESSION['mensagem'] = "Erro ao cadastrar usuário.";
    }

    header("Location: ../Register.php");
    exit;
}
?>