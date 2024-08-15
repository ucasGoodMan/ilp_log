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

// Atualiza o status para "concluído" quando o usuário clica em "finalizar"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "UPDATE movimentacaopvist SET status = 'concluido' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Operação finalizada com sucesso!";
}

// Consulta SQL para obter os produtos pendentes
$sql = "SELECT * FROM movimentacaopvist WHERE status = 'pendente'";
$result = $conn->query($sql);

// Verifica se há resultados
if ($result->num_rows > 0) {
    echo "<div class='produto-grid'>";
    echo "<div class='produto-header'>Produto ID</div>";
    echo "<div class='produto-header'>Nome do Produto</div>";
    echo "<div class='produto-header'>Quantidade</div>";
    echo "<div class='produto-header'>Status</div>";

    while ($row = $result->fetch_assoc()) {
        echo "<div class='produto-item'>";
        echo "<input type='text' value='" . $row["produto_id"] . "' readonly>";
        echo "<input type='text' value='" . $row["nome_produto"] . "' readonly>";
        echo "<input type='text' value='" . $row["quantidade"] . "' readonly>";
        echo "<form action='visProdPend.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button class='produto-item status-ok' type='submit'>Finalizar</button>";
        echo "</form>";
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "Nenhum produto pendente encontrado.";
}

$conn->close();
?>
