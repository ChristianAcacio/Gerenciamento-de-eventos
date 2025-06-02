<?php
session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;
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

  <!-- Eventos em destaque -->
  <section class="eventos-maiores">

    <article class="background-eventos">
      <h2>Expocrato 01/04</h2>
      <picture><img src="style/img/Expocrato_miniatura.jpeg" alt="Imagem do evento Expocrato" /></picture>
      <p>
        A Expocrato 2025 acontece de 11 a 20 de julho no Parque de Exposições Pedro Felício Cavalcante, no Crato. Prepare-se para viver 9 noites inesquecíveis com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.
      </p>
      <a href="Descricao.php?evento=expocrato_ativo"><button>Ver Detalhes</button></a>
    </article>

    <article class="background-eventos">
      <h2>Pau da Bandeira 02/04</h2>
      <picture><img src="style/img/Paudabandeira_miniatura.jpeg" alt="Imagem do evento Pau da Bandeira" /></picture>
      <p>
        Celebração tradicional em homenagem a Santo Antônio em Barbalha, com hasteamento do pau da bandeira, cultura popular e atrações musicais. Um dos eventos mais fortes do Cariri cearense.
      </p>
      <a href="Descricao.php?evento=paudabandeira_ativo"><button>Ver Detalhes</button></a>
    </article>

    <article class="background-eventos">
      <h2>Juaforró 03/04</h2>
      <picture><img src="style/img/Juaforro_miniatura.jpeg" alt="Imagem do evento Juaforró" /></picture>
      <p>
        O Juaforró 2024 ocorre de 19 a 23 de junho em Juazeiro do Norte. Com mais de 20 atrações, quadrilhas e comidas típicas, é um dos maiores eventos juninos da região.
      </p>
      <a href="Descricao.php?evento=juaforro_ativo"><button>Ver Detalhes</button></a>
    </article>

  </section>

</main>
</body>
</html>
