<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $data_evento = $_POST['data_evento'];
    $entrada = $_POST['entrada'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Tratamento da imagem
    $imagem_nome = null;
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        $imagem_nome = 'uploads/' . basename($_FILES['imagem']['name']);
        move_uploaded_file($_FILES['imagem']['tmp_name'], $imagem_nome);
    }

    try {
        $sql = "INSERT INTO cadastro_evento (nome, data_evento, tipo, descricao, imagem, valor)
                VALUES (:nome, :data_evento, :tipo, :descricao, :imagem, :valor)";

        $stmt = $conexao->prepare($sql);
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
