<?php
session_start();
include('php/conexao.php');

$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;

// Redireciona se não for admin
if (!isset($_SESSION['usuario_logado']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Busca eventos pendentes
$sql = "SELECT id_evento, nome, descricao, imagem FROM cadastro_evento WHERE status_evento = 'PENDENTE'";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Eventos</title>
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


<main>
    <section class="validação_titulo">
        <h1>Eventos Pendentes de Validação</h1>
    </section>

    <section>
        <?php if (count($eventos) > 0): ?>
            <?php foreach ($eventos as $evento): ?>
                <div class="background_validação">
                    <div class="validação_imagem">
                        <h2><?= htmlspecialchars($evento['nome']) ?></h2>
                        <picture>
                            <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento" width="250" height="250">
                        </picture>
                    </div>

                    <div class="validação_texto">
                        <p><?= htmlspecialchars($evento['descricao']) ?></p>

                        <form method="POST" action="php/validar_evento.php" class="opções">
                            <input type="hidden" name="id_evento" value="<?= $evento['id_evento'] ?>">
                            <button type="submit" name="acao" value="aprovar" class="aprovar">APROVAR</button>
                            <button type="submit" name="acao" value="rejeitar" class="rejeitar">REJEITAR</button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align:center;">Nenhum evento pendente no momento.</p>
        <?php endif; ?>
    </section>
</main>

</body>
</html>
