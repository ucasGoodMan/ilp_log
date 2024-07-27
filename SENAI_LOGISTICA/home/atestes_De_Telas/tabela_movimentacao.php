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

// Função para importar movimentações
function importarMovimentacoes($conn) {
    $sql = "SELECT * FROM movimentacao WHERE status='concluida'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $posicao = $row["posicao"];
            $produto = $row["produto"];
            // Atualiza o status da vaga para cheia
            atualizarStatus($conn, $posicao, 'cheia');
            echo "Produto $produto foi movido para a vaga $posicao.<br>";
        }
    } else {
        echo "Nenhuma movimentação concluída encontrada.<br>";
    }
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

// Importa as movimentações
importarMovimentacoes($conn);
$conn->close();
?>
