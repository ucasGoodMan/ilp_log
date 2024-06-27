<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $sql = "SELECT nturma, nometurma, qntalunos FROM turma";
    $result = $conn->query($sql);

    if (!$result) {
        echo json_encode(["mensagem" => "Erro ao executar a consulta: " . $conn->error]);
        $conn->close();
        exit;
    }

    $items = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    } else {
        echo json_encode(["mensagem" => "Nenhum registro encontrado"]);
    }
    echo json_encode($items);

} elseif ($method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (is_array($data)) {
        if ($conn->query("DELETE FROM turma") === FALSE) {
            echo json_encode(["mensagem" => "Falha ao deletar registros: " . $conn->error]);
            $conn->close();
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO turma (nturma, nometurma, qntalunos) VALUES (?, ?, ?)");
        if ($stmt === false) {
            echo json_encode(["mensagem" => "Falha ao preparar a declaração: " . $conn->error]);
            $conn->close();
            exit;
        }

        foreach ($data as $item) {
            $stmt->bind_param("isi", $item['nturma'], $item['nometurma'], $item['qntalunos']);
            if (!$stmt->execute()) {
                echo json_encode(["mensagem" => "Falha ao executar a declaração: " . $stmt->error]);
                $stmt->close();
                $conn->close();
                exit;
            }
        }
        $stmt->close();
        echo json_encode(["mensagem" => "Itens salvos com sucesso!"]);
    } else {
        echo json_encode(["mensagem" => "Dados inválidos"], JSON_UNESCAPED_UNICODE);
    }
}

$conn->close();
?>
