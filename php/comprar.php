<?php
header('Content-Type: application/json');

// Conexão com o banco


$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["erro" => "Erro ao conectar com o banco de dados."]);
    exit;
}

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(["erro" => "Método não permitido. Use POST."]);
    exit;
}

// Coleta os dados do POST
$id_evento = $_POST['id_evento'] ?? null;
$cpf = $_POST['cpf'] ?? null;

if (!$id_evento || !$cpf) {
    http_response_code(400);
    echo json_encode(["erro" => "Dados incompletos. Envie id_evento e cpf."]);
    exit;
}

// Verifica se o evento existe com consultas no banco de dados mysql
$stmt = $conn->prepare("SELECT nome FROM cadastro_evento WHERE id_evento = ?");
$stmt->bind_param("i", $id_evento);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $evento = $result->fetch_assoc();
    echo json_encode([
        "mensagem" => "Compra efetuada com sucesso para o evento: " . $evento['nome'],
        "cpf" => $cpf,
        "evento" => $evento['nome']
    ]);
} else {
    http_response_code(404);
    echo json_encode(["erro" => "Evento não encontrado."]);
}

$stmt->close();
$conn->close();
?>
