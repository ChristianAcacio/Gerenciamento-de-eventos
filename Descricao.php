<?php
session_start();
include('php/conexao.php');

$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;

// Verifica se o evento foi informado
if (!isset($_GET['id_evento']) || empty($_GET['id_evento'])) {
    echo "<p>Evento não encontrado.</p>";
    exit;
}

$id_evento = $_GET['id_evento'];

// Se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['usuario_logado'])) {
    $cpf_usuario = $_SESSION['usuario_logado'];
    $data_inscricao = date('Y-m-d');

    // Verifica se o usuário já está inscrito
    $verifica = $conexao->prepare("SELECT * FROM inscricoes WHERE id_evento = :id_evento AND cpf_usuario = :cpf");
    $verifica->bindParam(':id_evento', $id_evento);
    $verifica->bindParam(':cpf', $cpf_usuario);
    $verifica->execute();

    if ($verifica->rowCount() === 0) {
        // Insere a inscrição
        $stmt = $conexao->prepare("INSERT INTO inscricoes (id_evento, cpf_usuario, status_inscricao, data_inscricao)
                                   VALUES (:id_evento, :cpf_usuario, 'CONFIRMADA', :data_inscricao)");
        $stmt->bindParam(':id_evento', $id_evento);
        $stmt->bindParam(':cpf_usuario', $cpf_usuario);
        $stmt->bindParam(':data_inscricao', $data_inscricao);
        $stmt->execute();
        $mensagem = "Inscrição realizada com sucesso!";
    } else {
        $mensagem = "Você já está inscrito neste evento.";
    }
}

// Consulta o evento
$sql = "SELECT nome, data_evento, tipo, valor, descricao, imagem FROM cadastro_evento WHERE id_evento = :id_evento AND status_evento = 'APROVADO'";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_evento', $id_evento);
$stmt->execute();
$evento = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$evento) {
    echo "<p>Evento não encontrado ou ainda não aprovado.</p>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($evento['nome']) ?> - Detalhes</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body class="principal">

  <header class="header">
  <div class="logo">
    <a href="index.php">
      <img class="logo_img" src="style/img/Logo.png" alt="Logo do site" />
    </a>
  </div>

  <div class="header-right">


    <!-- Menu principal -->
    <nav class="nav-login">
      <ul class="nav_pc">
        <?php if ($tipo_usuario): ?>
          <li><a href="Meus_eventos.php">Meus Eventos</a></li>
            <?php if ($tipo_usuario === 'admin'): ?>
              <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
              <li><a href="validacao.php">Validação de eventos</a></li>
            <?php endif; ?>
            <form action="#" class="search">
              <div>
                <input name="pesquisa" type="search" placeholder="Buscar Eventos" />
              </div>
              <div>
                <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione" />
                  <datalist id="cidades">
                  <option value="Juazeiro do Norte">
                </datalist>
              </div>
            </form>
          <li><a href="php/logout.php">Logout</a></li>
        <?php else: ?>
            <form action="#" class="search">
              <div>
                <input name="pesquisa" type="search" placeholder="Buscar Eventos" />
              </div>
              <div>
                <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione" />
                  <datalist id="cidades">
                  <option value="Juazeiro do Norte">
                </datalist>
              </div>
            </form>
          <li>        
            <a href="login.php" class="login-icon">
              <img class="login_icone_img" src="style/img/user-interface.png" alt="Ícone de login">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>
</header>

<main class="descricao-evento-centralizada">
  <section class="evento-detalhado">
    <h1><?= htmlspecialchars($evento['nome']) ?></h1>
    <p><strong>Data:</strong> <?= date('d/m/Y', strtotime($evento['data_evento'])) ?></p>
    <p><strong>Tipo:</strong> <?= htmlspecialchars($evento['tipo']) ?></p>
    <p><strong>Valor:</strong> <?= $evento['tipo'] === 'Gratuito' ? 'Gratuito' : 'R$ ' . number_format($evento['valor'], 2, ',', '.') ?></p>

    <?php if (!empty($evento['imagem'])): ?>
      <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento" class="imagem-evento">
    <?php endif; ?>

    <h2>Descrição</h2>
    <p><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>

    <?php if (isset($mensagem)): ?>
      <p class="mensagem"><?= $mensagem ?></p>
    <?php endif; ?>

    <?php if (isset($_SESSION['usuario_logado'])): ?>
      <form method="POST">
        <button type="submit" class="botao">Inscrever-se</button>
      </form>
    <?php else: ?>
      <p><a href="login.php" class="botao">Faça login</a> para se inscrever neste evento.</p>
    <?php endif; ?>

  </section>
</main>

</body>
</html>
