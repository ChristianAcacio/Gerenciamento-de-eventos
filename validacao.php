<?php
session_start();
include('php/conexao.php');

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
    <picture class="logo">
        <a href="index.php">
            <img class="logo_img" src="style/img/Logo.png" alt="Logo do site">
        </a>
    </picture>

    <nav>
        <ul class="nav_pc">
            <li><a href="Meus_eventos.php">Meus eventos</a></li>
            <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
            <li><a href="validacao.php">Validação de eventos</a></li>
        </ul>
    </nav>

    <form action="#" class="search">
        <div class="search_header">
            <input name="pesquisa" type="search" placeholder="Buscar Eventos">
            <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione">
            <datalist id="cidades">
                <option value="Juazeiro do Norte">
            </datalist>
        </div>
        <div>
            <a href="login.php" class="login_icone">
                <img class="login_icone_img" src="style/img/user-interface.png" alt="Login">
            </a>
        </div>
    </form>
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
                            <img src="<?= htmlspecialchars($evento['imagem']) ?>" alt="Imagem do evento">
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
