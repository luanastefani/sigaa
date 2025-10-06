<?php
header('Content-Type: application/json');

// Configurações do banco de dados (ajuste conforme necessário)
// Descomente e configure quando for integrar com banco de dados
/*
$host = 'localhost';
$dbname = 'escola';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Erro de conexão: ' . $e->getMessage()]);
    exit;
}
*/

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_POST['tipo'] ?? '';
    
    switch ($tipo) {
        case 'atividade':
            cadastrarAtividade();
            break;
        case 'notas':
            cadastrarNota();
            break;
        case 'frequencia':
            cadastrarFrequencia();
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Tipo de operação inválido']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método não permitido']);
}

function cadastrarAtividade() {
    $titulo = $_POST['titulo'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $dataEntrega = $_POST['dataEntrega'] ?? '';
    $turma = $_POST['turma'] ?? '';
    
    if (empty($titulo) || empty($descricao) || empty($dataEntrega) || empty($turma)) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios']);
        return;
    }
    
    // Aqui você adicionaria o código para inserir no banco de dados
    // Exemplo:
    /*
    global $pdo;
    $sql = "INSERT INTO atividades (titulo, descricao, data_entrega, turma, data_cadastro) 
            VALUES (:titulo, :descricao, :dataEntrega, :turma, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titulo' => $titulo,
        ':descricao' => $descricao,
        ':dataEntrega' => $dataEntrega,
        ':turma' => $turma
    ]);
    */
    
    echo json_encode([
        'success' => true, 
        'message' => 'Atividade cadastrada com sucesso!',
        'dados' => [
            'titulo' => $titulo,
            'descricao' => $descricao,
            'dataEntrega' => $dataEntrega,
            'turma' => $turma
        ]
    ]);
}

function cadastrarNota() {
    $aluno = $_POST['aluno'] ?? '';
    $disciplina = $_POST['disciplina'] ?? '';
    $nota = $_POST['nota'] ?? '';
    $bimestre = $_POST['bimestre'] ?? '';
    
    if (empty($aluno) || empty($disciplina) || empty($nota) || empty($bimestre)) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios']);
        return;
    }
    
    if ($nota < 0 || $nota > 10) {
        echo json_encode(['success' => false, 'message' => 'Nota deve estar entre 0 e 10']);
        return;
    }
    
    // Aqui você adicionaria o código para inserir no banco de dados
    /*
    global $pdo;
    $sql = "INSERT INTO notas (aluno, disciplina, nota, bimestre, data_cadastro) 
            VALUES (:aluno, :disciplina, :nota, :bimestre, NOW())";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':aluno' => $aluno,
        ':disciplina' => $disciplina,
        ':nota' => $nota,
        ':bimestre' => $bimestre
    ]);
    */
    
    echo json_encode([
        'success' => true, 
        'message' => 'Nota cadastrada com sucesso!',
        'dados' => [
            'aluno' => $aluno,
            'disciplina' => $disciplina,
            'nota' => $nota,
            'bimestre' => $bimestre
        ]
    ]);
}

function cadastrarFrequencia() {
    $aluno = $_POST['aluno'] ?? '';
    $dataAula = $_POST['dataAula'] ?? '';
    $status = $_POST['status'] ?? '';
    $turma = $_POST['turma'] ?? '';
    
    if (empty($aluno) || empty($dataAula) || empty($status) || empty($turma)) {
        echo json_encode(['success' => false, 'message' => 'Todos os campos são obrigatórios']);
        return;
    }
    
    echo json_encode([
        'success' => true, 
        'message' => 'Frequência cadastrada com sucesso!',
        'dados' => [
            'aluno' => $aluno,
            'dataAula' => $dataAula,
            'status' => $status,
            'turma' => $turma
        ]
    ]);
}
?>