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
    echo "<div class='success-message'>Operação finalizada com sucesso!</div>";
}

// Consulta SQL para obter os produtos pendentes
$sql = "SELECT * FROM movimentacaopvist WHERE status = 'pendente'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Pendentes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .produto-grid {
            width: 80%;
            max-width: 900px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .produto-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }
        .produto-header, .produto-item {
            flex: 1;
            text-align: center;
        }
        .produto-header {
            font-weight: bold;
            color: #333;
        }
        .produto-item input {
            border: none;
            background: #f9f9f9;
            padding: 5px;
            width: 100%;
            max-width: 200px;
            text-align: center;
        }
        .produto-item input[readonly] {
            cursor: not-allowed;
        }
        .produto-item:last-child {
            border-bottom: none;
        }
        .produto-item .status-ok {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .produto-item .status-ok:hover {
            background-color: #218838;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<div class='produto-grid'>";
    
    // Headers
    echo "<div class='produto-row'>";
    echo "<div class='produto-header'>Produto ID</div>";
    echo "<div class='produto-header'>Nome do Produto</div>";
    echo "<div class='produto-header'>Quantidade</div>";
    echo "<div class='produto-header'>Ação</div>";
    echo "</div>";

    // Data rows
    while ($row = $result->fetch_assoc()) {
        echo "<div class='produto-row'>";
        echo "<div class='produto-item'><input type='text' value='" . $row["produto_id"] . "' readonly></div>";
        echo "<div class='produto-item'><input type='text' value='" . $row["nome_produto"] . "' readonly></div>";
        echo "<div class='produto-item'><input type='text' value='" . $row["quantidade"] . "' readonly></div>";
        echo "<div class='produto-item'>";
        echo "<form action='visProdPend.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button class='status-ok' type='submit'>Finalizar</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<div class='produto-grid'>Nenhum produto pendente encontrado.</div>";
}

$conn->close();
?>

</body>
</html>
