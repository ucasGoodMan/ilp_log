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

// Função para visualizar itens em cada vaga
function visualizarItens($conn) {
    $sql = "SELECT vagas.id, vagas.status, movimentacao.produto 
            FROM vagas 
            LEFT JOIN movimentacao ON vagas.id = movimentacao.posicao AND movimentacao.status='concluida'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $vaga = $row["id"];
            $status = $row["status"];
            $produto = $row["produto"] ? $row["produto"] : "Nenhum item";
            echo "Vaga: $vaga, Status: $status, Produto: $produto<br>";
        }
    } else {
        echo "Nenhuma vaga encontrada.<br>";
    }
}

// Visualiza os itens nas vagas
visualizarItens($conn);
$conn->close();
?>
