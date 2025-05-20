<?php
header('Content-Type: application/json');

//  banco de dados
$host = "localhost";
$db = "cultura_hive";
$user = "root";
$pass = ""; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro na conexão com o banco de dados."]);
    exit;
}

// "Expocrato 2025" assim como esta no figma
$sql = "SELECT * FROM cadastro_evento WHERE nome = 'Expocrato 2025' LIMIT 1";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $evento = $result->fetch_assoc();

    // Formata a resposta
    $response = [
        "id_evento"     => $evento["id_evento"],
        "nome"          => $evento["nome"],
        "data_evento"   => $evento["data_evento"],
        "hora_inicio"   => "18:00", // fixo conforme sua tela
        "valor"         => number_format($evento["valor"], 2, ',', '.'),
        "descricao"     => $evento["descricao"],
        "imagem"        => $evento["imagem"]
    ];

    echo json_encode($response);
} else {
    http_response_code(404);
    echo json_encode(["erro" => "Evento não encontrado."]);
}

$conn->close();
?>
