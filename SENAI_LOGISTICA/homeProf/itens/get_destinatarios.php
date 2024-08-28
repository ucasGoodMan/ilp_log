<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, CONCAT(cnpj, ' - ', rua, ', ', cidade) as nome FROM clientes WHERE tipo_cliente = 'destinatario'";
$result = $conn->query($sql);

$destinatarios = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $destinatarios[] = $row;
    }
}

echo json_encode($destinatarios);

$conn->close();
?>