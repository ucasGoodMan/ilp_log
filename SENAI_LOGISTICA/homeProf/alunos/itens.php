<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $sql = "SELECT `nturma`, `nometurma`, `qntalunos` FROM turma";
    $result = $conn->query($sql);

    $items = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;

        }
    }
    echo json_encode($items);
}elseif ($method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (is_array($data)) {
        $conn->query("DELETE FROM turma");
        $stmt = $conn->prepare("INSERT INTO turma (`nturma`, `nometurma`, `qntalunos`) VALUES (?, ?, ?)");
        foreach ($data as $item) {
            $stmt->bind_param("isi", $item['nturma'], $item['nometurma'], $item['qntalunos']);
            $stmt->execute();
        }
        $stmt->close();
        echo json_encode(["message" => "Itens salvos com sucesso!"]);
    } else {
        echo json_encode(["message" => "Dados inválidos"], JSON_UNESCAPED_UNICODE);
    }
}
    
$conn->close();
?>