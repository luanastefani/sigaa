<?php
session_start();
require_once 'conexao.php';

// Captura os dados enviados pelo formulário
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$tipo = $_POST['tipo'] ?? '';

// Verifica se os campos foram preenchidos
if (empty($usuario) || empty($senha) || empty($tipo)) {
    header("Location: login/login_{$tipo}.html?erro=campos_vazios");
    exit;
}

// Consulta o usuário no banco de dados
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND tipo = :tipo LIMIT 1");
$stmt->execute(['usuario' => $usuario, 'tipo' => $tipo]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se encontrou o usuário e se a senha confere
if ($user && password_verify($senha, $user['senha'])) {
    $_SESSION['usuario'] = $user['usuario'];
    $_SESSION['tipo'] = $user['tipo'];

    // Redireciona conforme o tipo
    switch ($user['tipo']) {
        case 'aluno':
            header("Location: pages/aluno/aluno.html");
            exit;
        case 'professor':
            header("Location: pages/professor/professor.html");
            exit;
        case 'coordenador':
            header("Location: pages/coordenador/coordenador.html");
            exit;
        default:
            header("Location: index.html");
            exit;
    }
} else {
    header("Location: login/login_{$tipo}.html?erro=login_invalido");
    exit;
}
