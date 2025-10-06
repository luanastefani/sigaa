<?php
session_start();
if (!isset($_SESSION['usuario_tipo']) || $_SESSION['usuario_tipo'] !== 'coordenador') {
    header("Location: ../index.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Painel do Coordenador</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

  <div class="dashboard">
    <h2>Bem-vindo, Coordenador(a) <?php echo $_SESSION['usuario_nome']; ?>!</h2>

    <nav>
      <ul>
        <li><a href="gerenciar_usuarios.php">Gerenciar Usuários</a></li>
        <li><a href="relatorios.php">Relatórios</a></li>
        <li><a href="comunicados.php">Comunicados</a></li>
        <li><a href="../backend/logout.php">Sair</a></li>
      </ul>
    </nav>
  </div>

</body>
</html>