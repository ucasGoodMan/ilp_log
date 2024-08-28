<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$vaga = $_POST['vaga'];

// Consulta para buscar os produtos dentro da vaga na tabela movimentacaopvist
$sql = "SELECT * FROM movimentacaopvist WHERE posicao_estoque = '$vaga'";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

// Verifica se há resultados
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Produto: " . $row['nome_produto'] . " - Quantidade: " . $row['quantidade'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Nenhum produto encontrado nesta vaga.";
}

$conn->close();
?>