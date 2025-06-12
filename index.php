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

  <div class="header-right">


    <!-- Menu principal -->
    <nav class="nav-login">
      <ul class="nav_pc">
        <?php if ($tipo_usuario): ?>
          <li><a href="Meus_eventos.php">Meus Eventos</a></li>
            <?php if ($tipo_usuario === 'admin'): ?>
              <div style="display:flex;" class="adm_pc">
                <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
                <li><a href="validacao.php">Validação de eventos</a></li>
              </div>
              <div style="display: flex;" class="adm_cel">
                <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
                <li><a href="validacao.php">Validação de eventos</a></li>
              </div>
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
          <li><a style="font-weight:600;" href="php/logout.php">Logout</a></li>
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

<main>


        <div class="slider">
            <div class="slider-content">
                
                <input type="radio" name="btn-radio" id="radio1" checked>
                <input type="radio" name="btn-radio" id="radio2">
                <input type="radio" name="btn-radio" id="radio3">
                <input type="radio" name="btn-radio" id="radio4">
        
                <div class="slides-box">
                    <div class="slide-box">
                        <img src="style/img/Expocrato_Banner.jpg" alt="Expocrato">
                    </div>
                    <div class="slide-box">
                        <img src="style/img/Design sem nome.png" alt="Pau da Bandeira">
                    </div>
                    <div class="slide-box">
                        <img src="style/img/Juaforro.jpg" alt="Jua Forró">
                    </div>
                    <div class="slide-box">
                        <img src="style/img/Romaria.webp" alt="Romaria de juazerio">
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-manual" id="nav-slider">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>


        
  <!-- Datas -->
  <section class="organizar-datas">
    <div class="datas-background">
      <div class="datas"><span>21/06</span><span>Terça-feira</span></div>
      <div class="datas"><span>30/06</span><span>Quarta-feira</span></div>
      <div class="datas"><span>14/07</span><span>Quinta-feira</span></div>
      <div class="datas"><span>28/07</span><span>Sexta-feira</span></div>
      <div style="display: flex;" class="datas"><span>Calendário</span><span>de eventos</span></div>
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
              <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento <?= htmlspecialchars($evento['nome']) ?>" width="250" height="250">
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