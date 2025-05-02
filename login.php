<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="style/style.css">
    <script async src="scrypt/code.js"></script>
</head>
<body class="login">

    <?php
    if (isset($_SESSION['mensagem'])) {
        echo "<script>alert('" . addslashes($_SESSION['mensagem']) . "');</script>";
        unset($_SESSION['mensagem']);
    }
    ?>
    
    <main>

        <div class="background-login">

            <h1>
                Login
            </h1>
            <form action="php/validarLogin.php" method="POST">
                <div>
                    <div>
                        <label for="">CPF</label>
                        <input type="text" name="usuario" placeholder="000.000.000-00">
                    </div>

                    <div class="senha_div">
                        <label for="">SENHA</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                        <span class="revelar_senha" onclick="Mostrar_senha()">👁️</span>
                    </div>

                    <div class="cadastro">
                        <button class="btn_link" type="submit">Entrar</button>
                        <a href="Register.php" class="btn_link">Criar conta</a>
                    </div>
                </div>
            </form>

        </div>

    </main>












</body>
</html>