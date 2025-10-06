<?php
session_start();
require_once '../conexao.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  echo json_encode(['success' => false, 'message' => 'Método não permitido']);
  exit;
}

$email = trim($_POST['email'] ?? '');
$senha = trim($_POST['senha'] ?? '');

if (!$email || !$senha) {
  echo json_encode(['success' => false, 'message' => 'Preencha todos os campos']);
  exit;
}

$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email LIMIT 1");
$stmt->execute([':email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
  echo json_encode(['success' => false, 'message' => 'Usuário não encontrado']);
  exit;
}

if (!password_verify($senha, $user['senha'])) {
  echo json_encode(['success' => false, 'message' => 'Senha incorreta']);
  exit;
}

// sucesso no login
$_SESSION['usuario_id'] = $user['id'];
$_SESSION['usuario_nome'] = $user['nome'];
$_SESSION['usuario_tipo'] = $user['tipo'];

// decide redirecionamento
switch ($user['tipo']) {
  case 'coordenador':
    $redirect = '../pages/coordenador/coordenador.php';
    break;
  case 'professor':
    $redirect = '../pages/professor/professor.php';
    break;
  case 'aluno':
    $redirect = '../pages/aluno/aluno.php';
    break;
  default:
    $redirect = '../index.html';
}

echo json_encode(['success' => true, 'redirect' => $redirect]);
exit;
