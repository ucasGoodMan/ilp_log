<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Conexão ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Pega o ID do produto
$id = $_POST["id"];

// Consulta para obter os detalhes do produto
$sql = "SELECT * FROM vistoriacarga WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Insere na tabela movimentacaopvist
$sql_insert = "INSERT INTO movimentacaopvist (produto_id, nome_produto, quantidade, status) VALUES (?, ?, ?, 'pendente')";
$stmt_insert = $conn->prepare($sql_insert);
$stmt_insert->bind_param("isi", $row["pedidob"], $row["nome_produto"], $row["qtd_prod"]);
$stmt_insert->execute();

// Atualiza a tabela vistoriacarga
$sql_update = "UPDATE vistoriacarga SET avariado = 1 WHERE id = ?";
$stmt_update = $conn->prepare($sql_update);
$stmt_update->bind_param("i", $id);
$stmt_update->execute();

echo "Produto pegado com sucesso!";
$conn->close();
?>
