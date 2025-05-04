<?php
    $servidor = "localhost";
    $user = "root";
    $senha = "";
    $banco = "cultura_hive";

    try {
        $conexao = new PDO("mysql:host=$servidor;dbname=$banco", $user, $senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Conexão falhou: " . $e->getMessage());
    }
?>