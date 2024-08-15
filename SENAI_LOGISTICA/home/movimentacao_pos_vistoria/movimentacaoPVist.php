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

// Consulta SQL para obter os produtos sem avarias ou faltando
$sql = "SELECT * FROM vistoriacarga WHERE avariado = 0 AND faltando = 0";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação de Produtos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .grid {
            width: 80%;
            max-width: 1000px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        .produto-header, .produto-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .produto-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            text-transform: uppercase;
        }
        .produto-header div, .produto-item input, .produto-item button {
            flex: 1;
            text-align: center;
        }
        .produto-item:last-child {
            border-bottom: none;
        }
        .produto-item input[type="text"], .produto-item input[type="number"] {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 8px;
            margin: 0 5px;
            width: 100%;
        }
        .produto-item input[readonly] {
            background-color: #f9f9f9;
        }
        .produto-item button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .produto-item button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<?php
if ($result->num_rows > 0) {
    echo "<div class='grid'>";
    
    // Cabeçalhos
    echo "<div class='produto-header'>";
    echo "<div>Número do Pedido</div>";
    echo "<div>Nome do Produto</div>";
    echo "<div>Quantidade</div>";
    echo "<div>Ação</div>";
    echo "</div>";

    // Itens do Produto
    while ($row = $result->fetch_assoc()) {
        echo "<div class='produto-item'>";
        echo "<input type='text' value='" . $row["pedidob"] . "' readonly>";
        echo "<input type='text' value='" . $row["nome_produto"] . "' readonly>";
        echo "<input type='number' value='" . $row["qtd_prod"] . "' readonly>";
        echo "<form action='update.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button class='status-ok' type='submit'>Pegar</button>";
        echo "</form>";
        echo "</div>";
    }

    echo "</div>";
} else {
    echo "<div class='grid'>Nenhum produto encontrado.</div>";
}

$conn->close();
?>

</body>
</html>
