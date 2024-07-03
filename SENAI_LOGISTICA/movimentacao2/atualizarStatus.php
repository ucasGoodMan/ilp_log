<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";
// Conexão com o banco de dados
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_POST['id'];
$status = $_POST['status'];

// Atualizar status do pedido
$sql = "UPDATE criacaopedidos SET status='$status' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Status atualizado com sucesso!";
    // Redirecionar para a tela de estoque se o status for "concluída"
    if ($status == "concluida") {
        header("Location: estoque.php");
    } else {
        header("Location: index.php");
    }
} else {
    echo "Erro ao atualizar status: " . $conn->error;
}

$conn->close();
?>
