<?php
session_start();
include('php/conexao.php');

$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;

// Buscar eventos aprovados
$sql = "SELECT id_evento, nome, data_evento, descricao, imagem FROM cadastro_evento WHERE status_evento = 'APROVADO'";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$eventos_aprovados = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>INDEX</title>
  <link rel="stylesheet" href="style/style.css" />
  <script async src="scrypt/code.js"></script>
</head>
<body class="principal">

<header class="header">
  <div class="logo">
    <a href="index.php">
      <img class="logo_img" src="style/img/Logo.png" alt="Logo do site" />
    </a>
  </div>

  <!-- Menu principal -->
  <nav>
    <ul class="nav_pc">
      <?php if ($tipo_usuario): ?>
        <li><a href="php/logout.php">Logout</a></li>
        <li><a href="Meus_eventos.php">Meus Eventos</a></li>
        <?php if ($tipo_usuario === 'admin'): ?>
          <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
          <li><a href="validacao.php">Validação de eventos</a></li>
        <?php endif; ?>
      <?php else: ?>
        <li><a href="login.php">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <!-- Formulário de busca -->
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

  <!-- Menu lateral (mobile) -->
  <nav class="menu_nav" id="menu_nav">
    <div class="menu_nav_content">
      <?php if ($tipo_usuario): ?>
        <a href="Meus_eventos.php">Meus Eventos</a>
        <?php if ($tipo_usuario === 'admin'): ?>
          <a href="cadastro_eventos.php">Cadastrar Evento</a>
          <a href="validacao.php">Validação de Eventos</a>
        <?php endif; ?>
        <a href="php/logout.php">Logout</a>
      <?php else: ?>
        <a href="login.php">Login</a>
      <?php endif; ?>
    </div>
  </nav>
</header>

<main>

  <!-- Slider -->
  <section class="slider">
    <div class="slider-content">
      <input type="radio" name="btn-radio" id="radio1" checked />
      <input type="radio" name="btn-radio" id="radio2" />
      <input type="radio" name="btn-radio" id="radio3" />
      <input type="radio" name="btn-radio" id="radio4" />

      <div class="slides-box">
        <div class="slide-box"><img src="style/img/Expocrato_Banner.jpg" alt="Expocrato" /></div>
        <div class="slide-box"><img src="style/img/Design sem nome.png" alt="Pau da Bandeira" /></div>
        <div class="slide-box"><img src="style/img/Juaforro.jpg" alt="Jua Forró" /></div>
        <div class="slide-box"><img src="style/img/Romaria.webp" alt="Romaria de Juazeiro" /></div>
      </div>
    </div>
  </section>

  <!-- Navegação do slider manual -->
  <nav class="nav-manual" id="nav-slider">
    <label for="radio1" class="manual-btn"></label>
    <label for="radio2" class="manual-btn"></label>
    <label for="radio3" class="manual-btn"></label>
    <label for="radio4" class="manual-btn"></label>
  </nav>

  <!-- Datas -->
  <section class="organizar-datas">
    <div class="datas-background">
      <div class="datas"><span>01/04</span><span>Terça-feira</span></div>
      <div class="datas"><span>02/04</span><span>Quarta-feira</span></div>
      <div class="datas"><span>03/04</span><span>Quinta-feira</span></div>
      <div class="datas"><span>04/04</span><span>Sexta-feira</span></div>
      <div class="datas"><span>CALENDÁRIO</span></div>
    </div>
  </section>

  <!-- Eventos Aprovados -->
  <section class="eventos-maiores">
    <?php if (count($eventos_aprovados) > 0): ?>
      <?php foreach ($eventos_aprovados as $evento): ?>
        <article class="background-eventos">
          <h2><?= htmlspecialchars($evento['nome']) ?> - <?= date('d/m', strtotime($evento['data_evento'])) ?></h2>

          <?php if (!empty($evento['imagem'])): ?>
            <picture>
              <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento <?= htmlspecialchars($evento['nome']) ?>">
            </picture>
          <?php endif; ?>

          <p><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>

          <a href="Descricao.php?id_evento=<?= $evento['id_evento'] ?>">
            <button>Ver Detalhes</button>
          </a>
        </article>
      <?php endforeach; ?>
    <?php else: ?>
      <p style="text-align: center;">Nenhum evento aprovado no momento.</p>
    <?php endif; ?>
  </section>

</main>
</body>
</html>