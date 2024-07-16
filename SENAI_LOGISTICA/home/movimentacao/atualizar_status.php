<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

<<<<<<< Updated upstream
// Dados recebidos via POST
$statusVaga = $_POST['statusVaga'];
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

=======
>>>>>>> Stashed changes
// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

<<<<<<< Updated upstream
// Atualiza a carga da vaga no banco de dados
$updateSql = "UPDATE estoque SET status = ?, pesoProd = ? WHERE statusVaga = ?";
$stmt = $conn->prepare($updateSql);
$stmt->bind_param('sis', $status, $pesoProd, $statusVaga);
if ($stmt->execute() === TRUE) {
    echo "Carga da vaga $statusVaga atualizada para $pesoProd.";
=======
// Pega os parâmetros da URL
$vaga = $_GET['vaga'];
$statusVaga = $_GET['status'];

// Atualiza o status da vaga no banco de dados
$updateSql = "UPDATE estoque SET status = '$statusVaga' WHERE posicao = '$vaga'";
if ($conn->query($updateSql) === TRUE) {
    echo "Status da vaga $vaga atualizado para $statusVaga.";
>>>>>>> Stashed changes
} else {
    echo "Erro ao atualizar o status da vaga: " . $conn->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
