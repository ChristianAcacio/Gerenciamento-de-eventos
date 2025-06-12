<?php
session_start();
include('php/conexao.php');

$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header("Location: login.php");
    exit;
}

$cpf_usuario = $_SESSION['usuario_logado'];

// Busca os eventos em que o usuário está inscrito
$sql = "
    SELECT e.nome, e.data_evento, e.descricao, e.imagem, e.tipo, e.valor
    FROM inscricoes i
    JOIN cadastro_evento e ON i.id_evento = e.id_evento
    WHERE i.cpf_usuario = :cpf AND e.status_evento = 'APROVADO'
";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':cpf', $cpf_usuario);
$stmt->execute();
$eventos = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <h2 class="titulo" style="text-align:center; margin-top: 40px;">Meus Eventos</h2>

    <div class="container-eventos">
    <?php if (count($eventos) === 0): ?>
        <p style="text-align:center; width:100%;">Você ainda não está inscrito em nenhum evento.</p>
    <?php else: ?>
        <?php foreach ($eventos as $evento): ?>
            <section class="background-eventos">
                <h2><?= htmlspecialchars($evento['nome']) ?> - <?= date('d/m/Y', strtotime($evento['data_evento'])) ?></h2>

                <?php if (!empty($evento['imagem'])): ?>
                    <picture>
                        <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento" style="max-width: 100%;
                        max-height: 290px; border-radius: 10px;">
                    </picture>
                <?php endif; ?>

                <p><strong>Tipo:</strong> <?= htmlspecialchars($evento['tipo']) ?></p>
                <p><strong>Valor:</strong> <?= $evento['tipo'] === 'Gratuito' ? 'Gratuito' : 'R$ ' . number_format($evento['valor'], 2, ',', '.') ?></p>
                <p><?= nl2br(htmlspecialchars($evento['descricao'])) ?></p>
            </section>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</main>

</body>
</html>
