<?php
session_start();
include('conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header("Location: ../login.php");
    exit;
}

// Verifica se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $cpf_organizador = $_SESSION['usuario_logado'];
    $nome = $_POST['nome'];
    $data_evento = $_POST['data_evento'];
    $entrada = $_POST['entrada'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Validação básica
    if (empty($nome) || empty($data_evento) || empty($entrada) || empty($descricao)) {
        $_SESSION['mensagem'] = "Preencha todos os campos obrigatórios.";
        header("Location: ../cadastro_eventos.php");
        exit;
    }

    // Tratamento da imagem
    $imagem_nome = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
        $nome_arquivo = uniqid('evento_', true) . '.' . $extensao;

        // Caminho absoluto para salvar o arquivo
        $caminho_salvar = __DIR__ . '/../uploads/' . $nome_arquivo;

        // Caminho relativo salvo no banco
        $imagem_nome = 'uploads/' . $nome_arquivo;

        // Move o arquivo enviado para a pasta de uploads
        move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_salvar);
    }

    try {
        $sql = "INSERT INTO cadastro_evento 
                (cpf_organizador, nome, data_evento, tipo, descricao, imagem, valor)
                VALUES 
                (:cpf_organizador, :nome, :data_evento, :tipo, :descricao, :imagem, :valor)";

        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(':cpf_organizador', $cpf_organizador);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':data_evento', $data_evento);
        $stmt->bindParam(':tipo', $entrada);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':imagem', $imagem_nome);
        $stmt->bindParam(':valor', $valor);

        if ($stmt->execute()) {
            $_SESSION['mensagem'] = "Evento cadastrado com sucesso.";
        } else {
            $_SESSION['mensagem'] = "Erro ao cadastrar evento.";
        }

    } catch (PDOException $e) {
        $_SESSION['mensagem'] = "Erro: " . $e->getMessage();
    }

    header("Location: ../index.php");
    exit;
}
?>
