<?php
// Conecta ao banco de dados
include("conexao.php");

// Verifica o método POST e se $_POST "id_evento" e "acao" estão definidos 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])) {

}




// HEAD e BODY do HTML
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RECUPERAR SENHA</title>
    <link rel="stylesheet" href="../style/style.css">
    <script async src="../scrypt/code.js"></script>
</head>
<body class="recuperar-senha">

    <?php
    if (isset($_SESSION['mensagem'])) {
        echo "<script>alert('" . addslashes($_SESSION['mensagem']) . "');</script>";
        unset($_SESSION['mensagem']);
    }
    ?>
    
    <main>

        <div class="background-recuperar-senha">

            <h1>
                Recuperar Senha
            </h1>
            <form action="validar_email.php" method="POST" >
                <div>
                    <div>
                        <label for="">EMAIL</label>
                        <input type="text" name="email" placeholder="Digite o seu e-mail" required >
                    </div>

                    <div class="recuperar">
                        <a href="index.html" class="btn_link"><button class="btn_link" type="submit">Enviar código de confirmação</button></a>
                    </div>
                </div>
            </form>
        </div>

    </main>












</body>
</html>