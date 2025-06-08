<?php
session_start();
include('php/conexao.php');

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
  <meta charset="UTF-8">
  <title>Meus Eventos</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body class="principal">

<header class="header">
    <picture class="logo">
        <a href="index.php">
            <img class="logo_img" src="style/img/Logo.png" alt="LOGO DO SITE">
        </a>
    </picture>

    <div>
        <ul class="nav_pc">
            <ol><a href="Meus_eventos.php">Meus eventos</a></ol>
            <ol><a href="cadastro_eventos.php">Cadastrar um evento</a></ol>
            <ol><a href="validacao.php">Validação de eventos</a></ol>
        </ul>
    </div>

    <div>
        <form action="#" class="search">
            <div class="search_header">
                <div>
                    <input name="pesquisa" type="list" placeholder="Buscar Eventos">
                </div>
                <div>
                    <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione">
                    <datalist id="cidades">
                        <option value="Juazeiro do Norte">
                    </datalist>
                </div>
            </div>
            <div>
                <ul>
                    <ol>
                        <picture class="login_icone">
                            <a href="login.php">
                                <img class="login_icone_img" src="style/img/user-interface.png" alt="Imagem de login">
                            </a>
                        </picture>
                    </ol>
                </ul>
            </div>
        </form>
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
