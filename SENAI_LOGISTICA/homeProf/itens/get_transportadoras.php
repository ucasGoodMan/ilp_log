<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, CONCAT(cnpj, ' - ', rua, ', ', cidade) as nome FROM clientes WHERE tipo_cliente = 'transportadora'";
$result = $conn->query($sql);

$transportadoras = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $transportadoras[] = $row;
    }
}

echo json_encode($transportadoras);

$conn->close();
?>
