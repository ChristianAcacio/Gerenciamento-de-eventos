<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição do Evento</title>
    <link rel="stylesheet" href="style/style.css">
    <script async src="scrypt/code.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const params = new URLSearchParams(window.location.search);
            const eventoId = params.get("evento");

            const eventos = ["expocrato_ativo", "paudabandeira_ativo", "juaforro_ativo", "romaria_ativo"];

            eventos.forEach(evento => {
                const div = document.getElementById(evento);
                if (div) {
                    div.style.display = evento === eventoId ? "block" : "none";
                }
            });
        });

        function pagamento() {
            document.getElementById("pagamento").style.display = "flex";
        }
    </script>
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
    <div class="expocrato" id="expocrato_ativo">
        <section class="evento-destaque">
            <div class="imagem">
                <img src="style/img/Expocrato_descricao.png" alt="Expocrato 2025">
            </div>
            <div class="informacoes">
                <div class="informacoes_info">
                    <h2>Expocrato 2025</h2>
                    <p><strong>Data:</strong> 11 a 20/07/2025</p>
                    <p><strong>Início:</strong> 18:00</p>
                    <p><strong>Valor:</strong> R$250,00</p>
                </div>
                <div class="informacoes_botao" onclick="pagamento()">
                    <a href="#" class="botao">Clique Para Participar</a>
                </div>
            </div>
        </section>
        <section class="descricao">
            <p>
                A Expocrato 2025 acontece de 11 a 20 de julho no Crato-CE. Serão 9 noites inesquecíveis (exceto no dia 14) com os maiores artistas do Brasil em um espetáculo de luz, som e emoção.
            </p>
        </section>
    </div>

    <div class="paudabandeira" id="paudabandeira_ativo">
        <section class="evento-destaque">
            <div class="imagem">
                <img src="style/img/Paudabandeira_banner.png" alt="Pau da Bandeira">
            </div>
            <div class="informacoes">
                <div class="informacoes_info">
                    <h2>Pau da Bandeira 2025</h2>
                    <p><strong>Data:</strong> 02/06/2025</p>
                    <p><strong>Início:</strong> 08:00</p>
                    <p><strong>Valor:</strong> Gratuito</p>
                </div>
                <div class="informacoes_botao" onclick="concluido()">
                    <a href="#" class="botao">Clique Para Participar</a>
                </div>
            </div>
        </section>
        <section class="descricao">
            <p>
                A Festa do Pau da Bandeira em Barbalha celebra Santo Antônio com o tradicional corte e carregamento do tronco, música, cultura e devoção. Um dos maiores eventos religiosos do Cariri.
            </p>
        </section>
    </div>  

    <div class="juaforro" id="juaforro_ativo">
        <section class="evento-destaque">
            <div class="imagem">
                <img src="style/img/Juaforro.jpg" alt="Juaforró">
            </div>
            <div class="informacoes">
                <div class="informacoes_info">
                    <h2>Juaforró 2025</h2>
                    <p><strong>Data:</strong> 19 a 23/06/2025</p>
                    <p><strong>Início:</strong> 19:00</p>
                    <p><strong>Valor:</strong> Gratuito</p>
                </div>
                <div class="informacoes_botao" onclick="concluido()">
                    <a href="#" class="botao">Clique Para Participar</a>
                </div>
            </div>
        </section>
        <section class="descricao">
            <p>
                O Juaforró é o maior São João do Cariri! Com shows, quadrilhas juninas e comidas típicas, ele acontece no Parque de Eventos Padre Cícero e atrai milhares de pessoas.
            </p>
        </section>
    </div>

    <div class="romaria" id="romaria_ativo">
        <section class="evento-destaque">
            <div class="imagem">
                <img src="style/img/Romaria_descricao.jpeg" alt="Romaria de Juazeiro">
            </div>
            <div class="informacoes">
                <div class="informacoes_info">
                    <h2>Romaria de Juazeiro</h2>
                    <p><strong>Data:</strong> 20/07/2025</p>
                    <p><strong>Início:</strong> 06:00</p>
                    <p><strong>Valor:</strong> Gratuito</p>
                </div>
                <div class="informacoes_botao" onclick="concluido()">
                    <a href="#" class="botao">Clique Para Participar</a>
                </div>
            </div>
        </section>
        <section class="descricao">
            <p>
                A Romaria é um dos maiores eventos religiosos do Brasil, reunindo milhares de fiéis em Juazeiro do Norte para homenagear Padre Cícero com fé, emoção e tradição.
            </p>
        </section>
    </div>

    <div id="pagamento" class="pagamento">
        <div class="pagamento_content">

            <div class="qrcode">
                <picture>
                    <img src="style/img/qrcode.png" alt="Qr code">
                </picture>

                <div class="qrcode_texto">
                    <span>
                        Acesse seu APP de pagamentos  
                    </span>
                    <span>
                        e faça a leitura do QR Code ao lado
                    </span>
                    <span>
                        para efetuar o pagamento.
                    </span>
                </div>
            </div>

            <div class="pagamento_pix">

                <span>
                    Código pagamento PIX:
                </span>

                <div class="pagamento_codigo">
                    <input type="text" value="00000000000000000000000000000" readonly class="codigo">

                    <button class="button_copiar" onclick="concluido()">
                        Copiar Codigo
                    </button>
                </div>

            </div>
        </div>
    </div>

    <div id="concluido" class="concluido">
        <div class="concluido_content">

            <h2>
                Inscrição feita com sucesso
            </h2>


                <picture>
                    <img src="style/img/certinho.png" alt="Certo">
                </picture>

                <button class="botao_concluido" onclick="fechar()">
                    Fechar
                </button>

        </div>
    </div>
</main>
</body>
</html>
