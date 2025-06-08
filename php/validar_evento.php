<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['usuario_logado']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_evento = $_POST['id_evento'];
    $acao = $_POST['acao'];

    $status = $acao === 'aprovar' ? 'APROVADO' : 'CANCELADO';

    $sql = "UPDATE cadastro_evento SET status_evento = :status WHERE id_evento = :id_evento";
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id_evento', $id_evento);

    if ($stmt->execute()) {
        $_SESSION['mensagem'] = "Evento $status com sucesso.";
    } else {
        $_SESSION['mensagem'] = "Erro ao atualizar evento.";
    }

    header("Location: ../validacao.php");
    exit;
}
?>
