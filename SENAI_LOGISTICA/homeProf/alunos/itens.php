<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

header('Content-Type: text/xml');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $sql = "SELECT nturma, nometurma, qntalunos FROM turma";
    $result = $conn->query($sql);

    if (!$result) {
        echo "<mensagem>Erro ao executar a consulta: " . $conn->error . "</mensagem>";
        $conn->close();
        exit;
    }

    $xml = new SimpleXMLElement('<turmas/>');

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $turma = $xml->addChild('turma');
            $turma->addChild('nturma', $row['nturma']);
            $turma->addChild('nometurma', $row['nometurma']);
            $turma->addChild('qntalunos', $row['qntalunos']);
        }
    } else {
        echo "<mensagem>Nenhum registro encontrado</mensagem>";
    }
    echo $xml->asXML();

} elseif ($method == 'POST') {
    $xml = simplexml_load_string(file_get_contents('php://input'));
    if ($xml) {
        if ($conn->query("DELETE FROM turma") === FALSE) {
            echo "<mensagem>Falha ao deletar registros: " . $conn->error . "</mensagem>";
            $conn->close();
            exit;
        }

        $stmt = $conn->prepare("INSERT INTO turma (nturma, nometurma, qntalunos) VALUES (?, ?, ?)");
        if ($stmt === false) {
            echo "<mensagem>Falha ao preparar a declaração: " . $conn->error . "</mensagem>";
            $conn->close();
            exit;
        }

        foreach ($xml->turma as $turma) {
            $stmt->bind_param("isi", (int)$turma->nturma, (string)$turma->nometurma, (int)$turma->qntalunos);
            if (!$stmt->execute()) {
                echo "<mensagem>Falha ao executar a declaração: " . $stmt->error . "</mensagem>";
                $stmt->close();
                $conn->close();
                exit;
            }
        }
        $stmt->close();
        echo "<mensagem>Itens salvos com sucesso!</mensagem>";
    } else {
        echo "<mensagem>Dados inválidos</mensagem>";
    }
}

$conn->close();
?>
