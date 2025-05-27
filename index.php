<?php
session_start();
$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link rel="stylesheet" href="./style/style.css">
    <script async src="scrypt/code.js"></script>
</head>
<body class="principal">
    
    <header class="header">
        <div class="logo">
            <a href="index.php">
                <img class="logo_img" src="style/img/Logo.png" alt="LOGO DO SITE">
            </a>
        </div>

        <nav>
            <ul class="nav_pc">
                <?php if ($tipo_usuario): ?>
                    <li><a href="php/logout.php">Logout</a></li>
                    <li><a href="Meus_eventos.php">Meus eventos</a></li>
                    <?php if ($tipo_usuario === 'admin'): ?>
                        <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
                        <li><a href="validacao.php">Validação de eventos</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>

        <form action="#" class="search">
            <input name="pesquisa" type="search" placeholder="Buscar Eventos">
            <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione">
            <datalist id="cidades">
                <option value="Juazeiro do Norte">
            </datalist>
        </form>

        <nav class="menu_nav" id="menu_nav">
            <div class="menu_nav_content">
                <a href="validacao.php">Validação de eventos</a>
                <a href="Meus_eventos.php">Meus eventos</a>
                <a href="#">Cadastrar eventos</a>
            </div>
        </nav>
    </header>

    <main>

        <section class="slider">
            <div class="slider-content">
                <input type="radio" name="btn-radio" id="radio1" checked>
                <input type="radio" name="btn-radio" id="radio2">
                <input type="radio" name="btn-radio" id="radio3">
                <input type="radio" name="btn-radio" id="radio4">

                <div class="slides-box">
                    <div class="slide-box"><img src="style/img/Expocrato_Banner.jpg" alt="Expocrato"></div>
                    <div class="slide-box"><img src="style/img/Design sem nome.png" alt="Pau da Bandeira"></div>
                    <div class="slide-box"><img src="style/img/Juaforro.jpg" alt="Jua Forró"></div>
                    <div class="slide-box"><img src="style/img/Romaria.webp" alt="Romaria de Juazeiro"></div>
                </div>
            </div>
        </section>

        <nav class="nav-manual" id="nav-slider">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </nav>

        <section class="organizar-datas">
            <div class="datas-background">
                <div class="datas"><span>01/04</span><span>Terça-feira</span></div>
                <div class="datas"><span>02/04</span><span>Quarta-feira</span></div>
                <div class="datas"><span>03/04</span><span>Quinta-feira</span></div>
                <div class="datas"><span>04/04</span><span>Sexta-feira</span></div>
                <div class="datas"><span>CALENDÁRIO</span></div>
            </div>
        </section>

        <section class="eventos-maiores">

            <article class="background-eventos">
                <h2>Expocrato 01/04</h2>
                <picture><img src="style/img/Expocrato_miniatura.jpeg" alt="Imagem do evento Expocrato"></picture>
                <p>
                    A espera acabou! O maior evento de música e cultura do interior do Ceará já tem data marcada
                    para agitar o Cariri. A Expocrato 2025 acontece de 11 a 20 de julho, no Parque de Exposições
                    Pedro Felício Cavalcante, no Crato.
                </p>
                <a href="Descricao.html?evento=expocrato_ativo"><button>Ver Detalhes</button></a>
            </article>

            <article class="background-eventos">
                <h2>Pau da Bandeira 02/04</h2>
                <picture><img src="style/img/Paudabandeira_miniatura.jpeg" alt="Imagem do evento Pau da Bandeira"></picture>
                <p>
                    A Festa do Pau da Bandeira é uma tradicional celebração em homenagem a Santo Antônio,
                    padroeiro de Barbalha, no Ceará. Acontece anualmente com corte, transporte e hasteamento
                    do tronco, manifestações culturais e shows.
                </p>
                <a href="Descricao.html?evento=paudabandeira_ativo"><button>Ver Detalhes</button></a>
            </article>

            <article class="background-eventos">
                <h2>Juaforró 03/04</h2>
                <picture><img src="style/img/Juaforro_miniatura.jpeg" alt="Imagem do evento Juaforró"></picture>
                <p>
                    O Juaforró 2024 acontece de 19 a 23 de junho no Parque de Eventos Padre Cícero e é gratuito.
                    Com mais de 20 atrações musicais, quadrilhas, comidas típicas e cultura.
                </p>
                <a href="Descricao.html?evento=juaforro_ativo"><button>Ver Detalhes</button></a>
            </article>

        </section>

    </main>
</body>
</html>
