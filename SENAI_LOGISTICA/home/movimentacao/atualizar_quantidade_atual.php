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

// Atualiza a quantidade atual
$sql = "
    UPDATE estoque e
    JOIN (
        SELECT posicao_estoque, SUM(quantidade) AS quantidade_total
        FROM movimentacaopvist
        GROUP BY posicao_estoque
    ) m
    ON e.posicaoVaga = m.posicao_estoque
    SET e.quantidadeAtual = m.quantidade_total;
";

if (!$conn->query($sql)) {
    die("Erro ao atualizar a quantidade: " . $conn->error);
}

// Consulta para buscar os dados das vagas
$sql = "SELECT posicaoVaga, statusVaga, quantidadeAtual, quantidadeMaxima FROM estoque";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if (!$result) {
    die("Erro na consulta: " . $conn->error);
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $vaga = $row['posicaoVaga'];
        $status = $row['statusVaga'];
        $quantidadeAtual = $row['quantidadeAtual'];
        $quantidadeMaxima = $row['quantidadeMaxima'];
        $quantidadeLivre = $quantidadeMaxima - $quantidadeAtual;

        echo "<tr>";
        echo "<td>$vaga</td>";
        echo "<td>$status</td>";
        echo "<td>$quantidadeAtual itens</td>";
        echo "<td>$quantidadeMaxima itens</td>";
        echo "<td>$quantidadeLivre itens</td>";
        echo "<td><button>Monitorar Vaga</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>Nenhum dado encontrado</td></tr>";
}

$conn->close();
?>