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
            <form action="php/validarLogin.php" method="POST" >
                <div>
                    <div>
                        <label for="">CPF</label>
<<<<<<< HEAD
                        <input type="text" name="usuario" placeholder="000.000.000-00" maxlength="11">
=======
                        <input type="text" name="usuario" placeholder="000.000.000-00" maxlength="11" >
>>>>>>> a28549b7ccec1b11a60796264395b0b0282e6959
                    </div>

                    <div class="senha_div">
                        <label for="">SENHA</label>
                        <input type="password" id="senha" name="senha" placeholder="Digite sua senha">
                        <span class="revelar_senha" onclick="Mostrar_senha()">👁️</span>
                    </div>

                    <div class="cadastro">
                        <a href="index.html" class="btn_link"><button class="btn_link" type="submit">Entrar</button></a>
                    </div>
                </div>
            </form>
                <div class="cadastro">
<<<<<<< HEAD
                    <a href="Register.php" class="btn_link"><button class="btn_link" type="submit">cadastre-se</button></a>
=======
                    <a href="Register.php" class="button2"><button class="button2" type="submit">Cadastre-se</button></a>
>>>>>>> a28549b7ccec1b11a60796264395b0b0282e6959
                </div>
        </div>

    </main>












</body>
</html>