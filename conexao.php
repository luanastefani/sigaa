
<?php
$host = '127.0.0.1'; // ou 'localhost'
$dbname = 'sigaa';
$username = 'root';
$password = ''; // coloque aqui a senha do seu MySQL, se tiver

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
?>