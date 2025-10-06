<?php
session_start();
include 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND tipo='$tipo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['senha'])) {
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_tipo'] = $user['tipo'];
        $_SESSION['usuario_nome'] = $user['nome'];

        if ($tipo === 'aluno') {
            header("Location: ../aluno/dashboard.php");
        } elseif ($tipo === 'professor') {
            header("Location: ../professor/dashboard.php");
        } elseif ($tipo === 'responsavel') {
            header("Location: ../responsavel/dashboard.php");
        } elseif ($tipo === 'coordenador') {
            header("Location: ../coordenador/dashboard.php");
        }
        exit();
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
$conn->close();
?>