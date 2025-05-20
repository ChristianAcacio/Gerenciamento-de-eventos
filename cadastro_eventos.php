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
        <a href="index.html" class="logo">
            <img class="logo_img" src="style/img/Logo.png" alt="Logo do site">
        </a>

        <nav>
            <ul class="nav_pc">
                <li><a href="Meus_eventos.php">Meus eventos</a></li>
                <li><a href="validacao.php">Validação de eventos</a></li>
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
                <a href="validação.html">Validação de eventos</a>
                <a href="Meus_eventos.html">Meus eventos</a>
                <a href="#">Cadastrar eventos</a>
            </div>
        </nav>
    </header>

    <main class="background-cadastro-evento">
        <section class="cadastro-evento">
            <form action="php/processa_cadastro_evento.php" method="POST" enctype="multipart/form-data">

                <div class="cadastro-evento-esquerda">
                    <h1>Cadastre seu evento</h1>

                    <div>
                        <label for="nome">Nome do Evento:</label>
                        <input type="text" id="nome" name="nome" placeholder="Nome do seu evento" required>
                    </div>

                    <div>
                        <label for="data_inicio">Data:</label>
                        <input type="date" id="data_inicio" name="data_inicio" required>
                        <span>até</span>
                        <input type="date" id="data_fim" name="data_fim" required>
                    </div>

                    <fieldset>
                        <legend>Entrada:</legend>
                        <label><input type="radio" name="entrada" value="Gratuito" required> Gratuito</label>
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
                        <input type="file" id="imagem" name="imagem" accept="image/*" required>
                    </div>

                    <div>
                        <label for="descricao">Descrição Detalhada:</label>
                        <textarea id="descricao" name="descricao" placeholder="Detalhe todas as informações do evento" required></textarea>
                    </div>

                    <div>
                        <button type="submit">Criar Evento</button>
                    </div>
                </div>

            </form>
        </section>
    </main>

</body>
</html>
