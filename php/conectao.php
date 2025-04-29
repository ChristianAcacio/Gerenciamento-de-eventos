<?php
    $servidor = "localhost";
    $user = "root";
    $senha = "";
    $banco = "cultura_hive";

    try {
        $conn = new PDO("mysql:host=$servidor;dbname=$banco", $user, $senha);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        die("Conexão falhou: " . $e->getMessage());
    }
?>