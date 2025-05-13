<?php
// Verificar a sessão do usuário FAZER ISSO DEPOIS
//require ("verifica_sessao.php");

// Conecta ao banco de dados
include("conexao.php");

// Verifica o método POST e se $_POST "id_evento" e "acao" estão definidos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_evento"], $_POST["acao"])) {

    // Armazena a ação "APROVADO/NEGADO" e o id do evento
    $input_id_evento = intval($_POST["id_evento"]);
    $input_acao = $_POST["acao"];

    // Verifica a ação
    if ($input_acao == "APROVADO" || $input_acao == "NEGADO") {
        // Atualiza a tabela cadastro_evento com prepared statements 
        $sql = "UPDATE aprovacao_evento SET status_aprovacao = ? WHERE id_evento = ?";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $input_acao, PDO::PARAM_STR);
        $stmt->bindValue(2, $input_id_evento, PDO::PARAM_STR);
        $stmt->execute();

        // Envia um email automático para o criador do evento
        // Seleciona os atributos e faz o JOIN, utilizando prepared statements
        $sql = "SELECT u.email, e.nome
        FROM cadastro_evento e
        JOIN cadastro_usuario u ON e.cpf_organizador = u.cpf
        WHERE e.id_evento = ?";

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $input_id_evento, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Envia o email
        if ($result) {
            include("enviar_email.php");

            $destinatario = $result['email'];
            $nome_evento = $result['nome'];
            $assunto = "Seu evento foi $input_acao";

            $mensagem = "<h1>Seu evento \"$nome_evento\" foi $input_acao.</h1>
            <p>Obrigado por utilizar o Cultura Hive!</p>";

            enviarEmail($destinatario, $assunto, $mensagem);
        }


        // Constrói o HTML
        ?>
        <div class="input_texto">
                <h3> <?php echo "EVENTO $input_acao"?> </h3>

                <?php
                // HTML do input
                if ($input_acao == "APROVADO") {
                    ?>
                    <picture> 
                        <img src="style/img/certinho.png" alt="Aprovado">
                    </picture>
                    <?php
                } else if ($input_acao == "NEGADO") {
                    ?>
                    <picture>
                        <img src="style/img/rejeitado.png" alt="Negado">
                    </picture>
                    <?php
                }
                ?>
        </div>
        <?php
    }
}

// Consultar os eventos com status "pendente" utilizando JOIN para unir as tabelas OBS: VERIFICAR QUAL O NOME CORRETO DOS ATRIBUTOS NO BANCO
$sql = "SELECT c.id_evento, c.nome, c.descricao, c.imagem FROM cadastro_evento c
JOIN aprovacao_evento a ON c.id_evento = a.id_evento 
WHERE a.status_aprovacao = 'PENDENTE'";

$stmt = $conexao->prepare($sql);
$stmt->execute();
$result_evento = $stmt->fetchAll(PDO::FETCH_ASSOC);


// HEAD e BODY do HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link rel="stylesheet" href="style/style.css">
    <script async src="../scrypt/code.js"></script>
    <script async src="../scrypt/aprovacao_eventosjs.js"></script>
</head>
<body class="principal">


    <header>

    <picture class="logo" onclick="mostrar_menu()">
        <a href="index.html">
            <img class="logo_img" src="style/img/Logo.png" alt="LOGO DO SITE">
        </a>
    </picture>


    </header>
    <main>

        <div class="validacao_titulo">
            <h1>
                Eventos Pendentes de Validação
            </h1>
        </div>

        <div>
            <?php // Verifica se há eventos pendentes
            if (count($result_evento) > 0) {
                // Percorre os eventos
                foreach ($result_evento as $evento) {
                    // Insere as informações do evento no HTML
                    ?>
                    <div class="background_validacao" id="evento_<?php echo $evento['id_evento']; ?>">
                        <div class="validacao_imagem">
                            <h2><?php echo htmlspecialchars($evento['nome']); ?></h2>
                            <picture>
                                <img src="<?php echo htmlspecialchars($evento['imagem']); ?>" alt="IMAGEM DO EVENTO">
                            </picture>
                        </div>

                        <div class="validacao_texto">
                            <p>
                                <?php echo nl2br(htmlspecialchars($evento['descricao'])); ?>
                            </p>

                            <div class="opcoes">
                                <!-- Executa o script javascript -->
                                <button class="aprovar" onclick="aprovar('<?php echo $evento['id_evento']; ?>')" data-id="<?php echo $evento['id_evento']; ?>">APROVAR</button>
                                <button class="negar" onclick="negar('<?php echo $evento['id_evento']; ?>')" data-id="<?php echo $evento['id_evento']; ?>">NEGAR</button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                ?>
                <p>Não há eventos com aprovação pendente.</p>
                <?php
            }
            ?>
        </div>
    </main>    
</body>
</html>
