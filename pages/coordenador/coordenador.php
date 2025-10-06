<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'coordenador') {
  header('Location: ../../login/login_coordenador.html');
  exit;
}
require_once '../../conexao.php';
?>
<?php include 'coordenador.html'; ?>
