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
        <div class="slider_back">
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
        </div>




        <div class="organizar-datas">
            <div class="datas-background">
                <div class="datas">
                    <span>01/04</span>
                    <span>Terça-feira</span>
                </div>

                <div class="datas">
                    <span>02/04</span>
                    <span>Quarta-feira</span>
                </div>

                <div class="datas">
                    <span>03/04</span>
                    <span>Quinta-feira</span>
                </div>

                <div class="datas">
                    <span>04/04</span>
                    <span>Sexta-feira</span>
                </div>

                <div class="datas">
                    <span>CALENDÁRIO</span>
                </div>
            </div>
        </div>

        <div class="eventos-maiores">

            <div class="background-eventos">

                <h2>Expocrato 01/04</h2>

                <picture>
                    <img src="style/img/Expocrato_miniatura.jpeg" alt="IMAGEM DO EVENTO">
                </picture>
                    <p>
                        A espera acabou! O maior evento de música e cultura do interior do Ceará já tem data marcada
                        para agitar o Cariri. A Expocrato 2025 acontece de 11 a 20 de julho, no Parque de Exposições
                        Pedro Felício Cavalcante, no Crato. Prepare-se para viver 9 noites inesquecíveis (exceto no dia 14) 
                        com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.
                    </p>

                    <a href="Descricao.php?evento=expocrato_ativo">
                        <button>Ver Detalhes</button>
                    </a>
            </div>

            <div class="background-eventos">

                <h2>Pau da Bandeira 02/04</h2>

                <picture>
                    <img src="style/img/Paudabandeira_miniatura.jpeg" alt="IMAGEM DO EVENTO">
                </picture>

                    <p>
                        A Festa do Pau da Bandeira é uma tradicional celebração em homenagem a Santo Antônio,
                        padroeiro de Barbalha, no Ceará. O evento acontece anualmente no início de junho e é
                        marcado pelo corte, transporte e hasteamento de um grande tronco de árvore
                        (o "pau da bandeira"), carregado por dezenas de devotos pelas ruas da cidade.
                        Além do ritual religioso, a festa conta com manifestações culturais, apresentações
                        musicais e atrai milhares de fiéis e turistas, sendo um dos maiores eventos
                        do Cariri cearense.
                    </p>

                    <a href="Descricao.php?evento=paudabandeira_ativo">
                        <button>Ver Detalhes</button>
                    </a>
        
            </div>

            <div class="background-eventos">
                
                <h2>Juaforró 03/04</h2>

                <picture>
                    <img src="style/img/Juaforro_miniatura.jpeg" alt="IMAGEM DO EVENTO">
                </picture>

                    <p>
                        O Juaforró 2024, tradicional festa junina de Juazeiro do Norte, acontece de 19 a 23 de junho no Parque de Eventos Padre Cícero e é gratuito. A programação inclui mais de 20 atrações musicais como Fagner, Taty Girl, Solange Almeida, Mano Walter, Banda Líbanos e muitos outros. Além dos shows, o evento conta com apresentações de 28 quadrilhas juninas, barracas com comidas típicas e atividades culturais.
                    </p>

                    <a href="Descricao.php?evento=juaforro_ativo">
                        <button>Ver Detalhes</button>
                    </a>
            </div>

        </div>

    </main>

</body>
</html>