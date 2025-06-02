<?php
session_start();        // Inicia a sessão se ainda não estiver iniciada
session_unset();        // Limpa todas as variáveis de sessão
session_destroy();      // Encerra a sessão completamente

header("Location: ../index.php"); // Redireciona para a página inicial
exit;
?>
