<?php
// Conecta ao banco de dados 
include("conexao.php");
        
// Verifica o método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nascimento = $_POST['data_nascimento'];
    $genero = $_POST['genero'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];

    // Criptografia, converte a senha em um hash seguro, usando o brcrypt, PLACEHOLDER
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Prepara a inserção dos dados no banco, VERIFICAR QUAL O NOME CORRETO DA TABELA NO BANCO
    $stmt = $conexao->prepare("
        INSERT INTO usuarios (nome, email, senha, data_nascimento, genero, cep, cidade, bairro, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
    ");
    
    // Associa os parâmetros à query
    $stmt->bind_param("sssssssss", $nome, $email, $senha_hash, $data_nascimento, $genero, $cep, $cidade, $bairro, $estado);

    // Executa e verifica se deu certo
    if ($stmt->execute()) {
        echo "Usuário cadastrado com sucesso.";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fecha a conexão e o banco
    $stmt->close();
    $conexao->close();
}
?>