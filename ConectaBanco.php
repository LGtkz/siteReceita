<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbName = "sitereceitas";
    try {
        $conexao = new PDO("mysql:host=$servidor;dbname=$dbName", $usuario, $senha);
        // Configuração para lançar exceções em caso de erros
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
    }
?>