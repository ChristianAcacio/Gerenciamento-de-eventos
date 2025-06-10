<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <script async src="scrypt/code.js"></script>
    <title>REGISTER</title>
</head>
<body class="cadastro">
    
    <main class="background-cadastro">

    <script>
        <?php if (isset($_SESSION['mensagem'])): ?>
            alert("<?= $_SESSION['mensagem'] ?>");
            <?php unset($_SESSION['mensagem']); ?>
        <?php endif; ?>
    </script>

        <form method="POST" action="php/cadastro.php">

            <h1>CADASTRO</h1>
            
            <div class="organizer">
                <div class="esquerda">
                    <div>
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" placeholder="CPF" maxlength="11">
                    </div>

                    <div>
                        <label for="Nome">Nome:</label>
                        <input type="text" name="Nome" placeholder="Nome">
                    </div>

                    <div>
                        <label for="e-mail">E-mail:</label>
                        <input type="text" name="email" placeholder="example@example.com">
                    </div>

                    <div>
                        <label for="data">Data de Nascimento:</label>
                        <input type="date" name="data" max="2025-06-10">
                    </div>

                    <div class="senha_div">
                        <label for="">Senha</label>
                        <input name="senha" type="password" id="senha" placeholder="Digite sua senha">
                        <span class="revelar_senha" onclick="Mostrar_senha()">👁️</span>
                    </div>

                    <div class="genero_div">
                        <label for="genero">Gênero:</label>
                        <div class="genero">
                            <label><input type="radio" name="genero" value="M"><span>Masculino</span></label>
                            <label><input type="radio" name="genero" value="F"><span>Feminino</span></label>
                        </div>
                    </div>
                </div>


                <div class="direita">
                    <div>
                        <label for="cep">CEP:</label>
                        <input type="text" name="cep" id="cep" placeholder="00000-000" maxlength="9">
                    </div>

                    <div>
                        <label for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade">
                    </div>

                    <div>
                        <label for="Bairro">Bairro:</label>
                        <input type="text" name="Bairro" id="bairro" placeholder="Bairro">
                    </div>

                    <div>
                        <label for="Estado">Estado:</label>
                        <input type="text" name="Estado" id="uf" placeholder="UF (ex: CE)" maxlength="2">
                    </div>
                </div>
            </div>

            <div class="cadastro_buttons" style="margin-top: 30px;">
                <a href="login.php" class="button2">Voltar</a>
                <button type="submit" class="btn_link_cadastrar">Cadastrar</button>
            </div>

        </form>

    </main>

    <script>
        document.getElementById("cep").addEventListener("blur", async function () {
            const cep = this.value.replace(/\D/g, "");

            if (cep.length === 8) {
                try {
                    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`);
                    const data = await response.json();

                    if (!data.erro) {
                        document.getElementById("cidade").value = data.localidade;
                        document.getElementById("bairro").value = data.bairro;
                        document.getElementById("uf").value = data.uf;
                    } else {
                        alert("CEP não encontrado.");
                    }
                } catch (e) {
                    alert("Erro ao buscar o CEP.");
                }
            } else {
                alert("CEP inválido. Digite os 8 números do CEP.");
            }
        });
    </script>


</body>
</html>
