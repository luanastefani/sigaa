<?php
session_start();
require_once '../../conexao.php';
header('Content-Type: application/json');

if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'coordenador') {
  echo json_encode(['success' => false, 'message' => 'Acesso negado']);
  exit;
}

$tipo = $_POST['tipo'] ?? '';

try {
  switch ($tipo) {
    case 'professor':
      $sql = "INSERT INTO professores (nome, email, disciplina) VALUES (:nome, :email, :disciplina)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':nome' => $_POST['nome'] ?? '',
        ':email' => $_POST['email'] ?? '',
        ':disciplina' => $_POST['disciplina'] ?? '',
      ]);
      echo json_encode(['success' => true, 'message' => 'Professor cadastrado com sucesso!']);
      break;

    case 'turma':
      $sql = "INSERT INTO turmas (nome, ano, turno) VALUES (:nome, :ano, :turno)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':nome' => $_POST['nomeTurma'] ?? '',
        ':ano' => $_POST['ano'] ?? '',
        ':turno' => $_POST['turno'] ?? '',
      ]);
      echo json_encode(['success' => true, 'message' => 'Turma cadastrada com sucesso!']);
      break;

    case 'comunicado':
      $sql = "INSERT INTO comunicados (titulo, mensagem, criado_por) VALUES (:titulo, :mensagem, :criado_por)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute([
        ':titulo' => $_POST['titulo'] ?? '',
        ':mensagem' => $_POST['mensagem'] ?? '',
        ':criado_por' => $_SESSION['usuario_id'],
      ]);
      echo json_encode(['success' => true, 'message' => 'Comunicado enviado!']);
      break;

    default:
      echo json_encode(['success' => false, 'message' => 'Tipo inválido']);
  }
} catch (Exception $e) {
  echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
