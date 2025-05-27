<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link rel="stylesheet" href="style/style.css">
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

        <div class="validação_titulo">
            <h1>
                Eventos Pendentes de Validação
            </h1>
        </div>

        <div>

            <div class="background_validação" id="evento01">

                <div class="validação_imagem">
                    <h2>Expocrato 01/04</h2>
                    <picture>
                        <img src="style/img/Expocrato_miniatura.jpeg" alt="IMAGEM DO EVENTO">
                    </picture>
                </div>

                <div class="validação_texto">
                    <p>
                        A espera acabou! O maior evento de música e cultura do interior do Ceará já tem data marcada
                        para agitar o Cariri. A Expocrato 2025 acontece de 11 a 20 de julho, no Parque de Exposições
                        Pedro Felício Cavalcante, no Crato. Prepare-se para viver 9 noites inesquecíveis (exceto no dia 14) 
                        com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.
                    </p>

                    <div class="opções">

                        <span class="aprovar" onclick="aprovar('evento01')">APROVAR</span>

                        <span class="rejeitar" onclick="rejeitar('evento01')">REJEITAR</span>

                    </div>
                </div>

                <div class="aprovado_texto">
                    <h3>Aprovado</h3>
                    <picture>
                        <img src="style/img/certinho.png" alt="Aprovado">
                    </picture>
                </div>
                <div class="rejeitado_texto">
                    <h3>Rejeitado</h3>
                    <picture>
                        <img src="style/img/rejeitado.png" alt="Rejeitado">
                    </picture>
                </div> 

            </div>

            <div class="background_validação" id="evento02">

                <div class="validação_imagem">
                    <h2>Expocrato 01/04</h2>
                    <picture>
                        <img src="style/img/Expocrato_miniatura.jpeg" alt="IMAGEM DO EVENTO">
                    </picture>
                </div>

                <div class="validação_texto">
                    <p>
                        A espera acabou! O maior evento de música e cultura do interior do Ceará já tem data marcada
                        para agitar o Cariri. A Expocrato 2025 acontece de 11 a 20 de julho, no Parque de Exposições
                        Pedro Felício Cavalcante, no Crato. Prepare-se para viver 9 noites inesquecíveis (exceto no dia 14) 
                        com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.
                    </p>

                    <div class="opções">

                        <span class="aprovar" onclick="aprovar('evento02')">APROVAR</span>

                        <span class="rejeitar" onclick="rejeitar('evento02')">REJEITAR</span>

                    </div>
                </div>

                <div class="aprovado_texto">
                    <h3>Aprovado</h3>
                    <picture>
                        <img src="style/img/certinho.png" alt="Aprovado">
                    </picture>
                </div>
                <div class="rejeitado_texto">
                    <h3>Rejeitado</h3>
                    <picture>
                        <img src="style/img/rejeitado.png" alt="Rejeitado">
                    </picture>
                </div> 

            </div>

            <div class="background_validação" id="evento03">

                <div class="validação_imagem">
                    <h2>Expocrato 01/04</h2>
                    <picture>
                        <img src="style/img/Expocrato_miniatura.jpeg" alt="IMAGEM DO EVENTO">
                    </picture>
                </div>

                <div class="validação_texto">
                    <p>
                        A espera acabou! O maior evento de música e cultura do interior do Ceará já tem data marcada
                        para agitar o Cariri. A Expocrato 2025 acontece de 11 a 20 de julho, no Parque de Exposições
                        Pedro Felício Cavalcante, no Crato. Prepare-se para viver 9 noites inesquecíveis (exceto no dia 14) 
                        com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.
                    </p>
                    

                    <div class="opções">

                        <span class="aprovar" onclick="aprovar('evento03')">APROVAR</span>

                        <span class="rejeitar" onclick="rejeitar('evento03')">REJEITAR</span>

                    </div>
                </div>

                <div class="aprovado_texto">
                    <h3>Aprovado</h3>
                    <picture>
                        <img src="style/img/certinho.png" alt="Aprovado">
                    </picture>
                </div>
                <div class="rejeitado_texto">
                    <h3>Rejeitado</h3>
                    <picture>
                        <img src="style/img/rejeitado.png" alt="Rejeitado">
                    </picture>
                </div> 

            </div>

        </div>

    </main>
</body>
</html>