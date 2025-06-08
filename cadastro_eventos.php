<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos</title>
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

    <main class="background-cadastro-evento">
        <section>
            <form action="php/eventos.php" method="POST" enctype="multipart/form-data" class="cadastro-evento">

                <div class="cadastro-evento-esquerda">
                    <h1>Cadastre seu evento</h1>

                    <div>
                        <label for="nome">Nome do Evento:</label>
                        <input type="text" id="nome" name="nome" placeholder="Nome do seu evento" required>
                    </div>

                    <div>
                        <label for="data_inicio">Data do evento:</label>
                        <input type="date" id="data_inicio" name="data_evento" required>
                    </div>

                    <fieldset class="fildset">
                        <span>Entrada:</span>
                        <label><input type="radio" name="entrada" value="Gratuito" checked> Gratuito</label>
                        <label><input type="radio" name="entrada" value="Pago"> Pago</label>
                    </fieldset>

                    <div>
                        <label for="valor">Valor do Evento:</label>
                        <input type="text" id="valor" name="valor" placeholder="R$ 00,00">
                    </div>
                </div>

                <div class="cadastro-evento-direita">
                    <div>
                        <label for="imagem">Imagem do Evento:</label>
                        <input type="file" id="imagem" name="imagem" accept="image/*" required class="imagem_label">
                    </div>

                    <div class="textarea">
                        <label for="descricao">Descrição Detalhada:</label>
                        <textarea id="descricao" name="descricao" placeholder="Detalhe todas as informações do evento" required class="textarea_label"></textarea>
                    </div>

                    <button class="btn_link" type="submit">Cadastrar</button>

                </div>

            </form>
        </section>
    </main>

</body>
</html>
