<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eventos - Juaforró e Expocrato</title>
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

<main class="container-eventos">

    <h2 class="titulo">Meus Eventos</h2>

    <h2 class="titulo-evento">Juaforró</h2>
    <section class="evento">
      <img src="style/img/Juaforro_miniatura.jpeg" alt="Juaforró">
      <div class="descricao-evento">
        <p>O Juaforró 2024, tradicional festa junina de Juazeiro do Norte, acontece de 19 a 23 de junho no Parque de Eventos Padre Cícero e é gratuito. A programação inclui mais de 20 atrações musicais como Fagner, Taty Girl, Solange Almeida, Mano Walter, Banda Líbanos e muitos outros. Além dos shows, o evento conta com apresentações de 28 quadrilhas juninas, barracas com comidas típicas e atividades culturais.</p>
      </div>
    </section>
  
    <h2 class="titulo-evento">Expocrato 2025</h2>
    <section class="evento">
      <img src="style/img/Expocrato_miniatura.jpeg" alt="Expocrato 2025">
      <div class="descricao-evento">
        <p>A espera acabou! O maior evento de música e cultura do interior do Ceará já tem data marcada para agitar o Cariri. A Expocrato 2025 acontece de 11 a 20 de julho, no Parque de Exposições Pedro Felício Cavalcante, no Crato. Prepare-se para viver 9 noites inesquecíveis (exceto no dia 14) com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.</p>
      </div>
    </section>
  
  </main>

</body>
</html>