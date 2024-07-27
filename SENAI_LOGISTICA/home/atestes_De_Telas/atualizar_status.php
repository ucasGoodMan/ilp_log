<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Função para atualizar o status das vagas
function atualizarStatus($conn, $vaga, $status) {
    $sql = "UPDATE vagas SET status='$status' WHERE id='$vaga'";
    if ($conn->query($sql) === TRUE) {
        echo "Status da vaga $vaga atualizado para $status.<br>";
    } else {
        echo "Erro ao atualizar status: " . $conn->error . "<br>";
    }
}

// Atualiza o status (exemplo)
atualizarStatus($conn, 'A1', 'cheia');
$conn->close();
?>
