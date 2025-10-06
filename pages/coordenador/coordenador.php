<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';

    switch ($tipo) {
        case 'professor':
            cadastrarProfessor();
            break;
        case 'turma':
            cadastrarTurma();
            break;
        case 'relatorio':
            gerarRelatorio();
            break;
        case 'comunicado':
            enviarComunicado();
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Operação inválida']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
}

function cadastrarProfessor() {
    echo json_encode(['success' => true, 'message' => 'Professor cadastrado com sucesso!']);
}

function cadastrarTurma() {
    echo json_encode(['success' => true, 'message' => 'Turma cadastrada com sucesso!']);
}

function gerarRelatorio() {
    echo json_encode(['success' => true, 'message' => 'Relatório gerado com sucesso!']);
}

function enviarComunicado() {
    echo json_encode(['success' => true, 'message' => 'Comunicado enviado com sucesso!']);
}
?>
