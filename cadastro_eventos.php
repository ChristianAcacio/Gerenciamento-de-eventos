<?php
session_start();
include('php/conexao.php');

$tipo_usuario = $_SESSION['tipo_usuario'] ?? null;
?>

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
  <div class="logo">
    <a href="index.php">
      <img class="logo_img" src="style/img/Logo.png" alt="Logo do site" />
    </a>
  </div>

  <div class="header-right">


    <!-- Menu principal -->
    <nav class="nav-login">
      <ul class="nav_pc">
        <?php if ($tipo_usuario): ?>
          <li><a href="Meus_eventos.php">Meus Eventos</a></li>
            <?php if ($tipo_usuario === 'admin'): ?>
              <li><a href="cadastro_eventos.php">Cadastrar um evento</a></li>
              <li><a href="validacao.php">Validação de eventos</a></li>
            <?php endif; ?>
            <form action="#" class="search">
              <div>
                <input name="pesquisa" type="search" placeholder="Buscar Eventos" />
              </div>
              <div>
                <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione" />
                  <datalist id="cidades">
                  <option value="Juazeiro do Norte">
                </datalist>
              </div>
            </form>
          <li><a href="php/logout.php">Logout</a></li>
        <?php else: ?>
            <form action="#" class="search">
              <div>
                <input name="pesquisa" type="search" placeholder="Buscar Eventos" />
              </div>
              <div>
                <input list="cidades" id="cidade" name="cidade" placeholder="Digite ou selecione" />
                  <datalist id="cidades">
                  <option value="Juazeiro do Norte">
                </datalist>
              </div>
            </form>
          <li>        
            <a href="login.php" class="login-icon">
              <img class="login_icone_img" src="style/img/user-interface.png" alt="Ícone de login">
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </nav>
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
                        <div class="fildset_op">
                            <label><input type="radio" name="entrada" value="Gratuito" checked> Gratuito</label>
                            <label><input type="radio" name="entrada" value="Pago"> Pago</label>
                        </div>
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

                    <button class="btn_link_cadastrar" type="submit">Cadastrar</button>

                </div>
                
            </form>
        </section>
    </main>

</body>
</html>
