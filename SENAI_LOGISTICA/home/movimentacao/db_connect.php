<?php
$servername = "localhost";
$username = "root"; // Substitua pelo seu usuário do banco de dados
$password = "root"; // Substitua pela sua senha do banco de dados
$dbname = "senai"; // Substitua pelo nome do seu banco de dados

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checa a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>