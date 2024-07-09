<?php
// relacionado com estoque
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Dados recebidos via POST
$statusVaga = $_POST['vaga'];
$status = $_POST['status'];

// Definir o peso padrão baseado na linha (andar)
$andar = substr($statusVaga, 1);
$pesoProd = 0;
if ($andar == 1) {
    $pesoProd = 900;
} elseif ($andar == 2) {
    $pesoProd = 700;
} elseif ($andar == 3) {
    $pesoProd = 500;
} elseif ($andar == 4) {
    $pesoProd = 300;
} elseif ($andar == 5) {
    $pesoProd = 150;
}

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Atualiza a carga da vaga no banco de dados
$updateSql = "UPDATE estoque SET status = ?, pesoProd = ? WHERE statusVaga = ?";
$stmt = $conn->prepare($updateSql);
$stmt->bind_param('sis', $status, $pesoProd, $statusVaga);
if ($stmt->execute() === TRUE) {
    echo "Carga da vaga $statusVaga atualizada para $pesoProd.";
} else {
    echo "Erro ao atualizar a carga da vaga: " . $conn->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();

// Redireciona de volta para a interface principal
header("Location: estadoEstoque.php");
exit();
?>
