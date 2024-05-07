

<?php

$host = 'localhost'; // ou o IP do servidor de banco de dados
$dbname = 'icefest';
$user = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    // Configura o PDO para lançar exceções em caso de erro
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Configura o PDO para usar caracteres UTF-8
    $conn->exec("SET NAMES utf8");
} catch(PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}





