<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $type = $_POST['type'];
    $value = $_POST['value'];

    if ($type === 'destinatario') {
        $sql = "INSERT INTO clientes (nome, tipo) VALUES ('$value', 'destinatario')";
    } else if ($type === 'endereco') {
        $sql = "INSERT INTO clientes (endereco, tipo) VALUES ('$value', 'endereco')";
    } else if ($type === 'remetente') {
        $sql = "INSERT INTO clientes (nome, tipo) VALUES ('$value', 'remetente')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Novo $type adicionado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>