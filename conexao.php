<?php
$host = 'localhost';
$dbname = 'sigaa';
$username = 'root'; // ajuste se necessário
$password = '';     // ajuste se necessário

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}
