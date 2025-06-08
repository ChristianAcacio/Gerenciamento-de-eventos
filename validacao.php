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
                <img class="logo_img" src="style/img/Logo.png" alt="LOGO DO SITE">
            </a>
        </picture>

        <div>

            <ul class="nav_pc">


                <ol>
                    <a href="Meus_eventos.php">Meus eventos</a>
                </ol>

                <ol>
                    <a href="cadastro_eventos.php">Cadastrar um evento</a>
                </ol>

                <ol>
                    <a href="validacao.php">Validação de eventos</a>
                </ol>
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
                            <picture class="login_icone" >
                                <a href="login.php">
                                    <img class="login_icone_img" src="style/img/user-interface.png" alt="Imagem de login" >
                                </a>
                            </picture>
                        </ol>
                    </ul>
                </div>

            </form>
        </div>

        <div class="menu_nav" id="menu_nav">
            <div class="menu_nav_content">
                <a href="validacao.php">Validação de eventos</a>
                <a href="Meus_eventos.php">Meus eventos</a>
                <a href="#">Cadastrar eventos</a>
            </div>
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
