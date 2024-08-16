<?php

$servername = "localhost";
$username = "root";
$password = "";
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
    $message = "Operação finalizada com sucesso!";
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 900px;
            width: 100%;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            position: absolute;
        }
        .header {   
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 10px;
            margin-bottom: 40px;
        }

        .header h1 {
            color: rgb(37, 91, 168);
            font-size: 28px;
            margin: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            color: rgb(37, 91, 168);
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;

        }
        button {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2d72b7;
        }
    </style>
</head>
<body>
<?php
    include "../../sidebarALU.php";
    ?>
<div class="container">
    <div class="header">
        <h1>Produtos Pendentes</h1>
    </div>

    <?php
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Produto ID</th><th>Nome do Produto</th><th>Quantidade</th><th>Ação</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["produto_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nome_produto"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["quantidade"]) . "</td>";
            echo "<td>";
            echo "<form action='visProdPend.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>";
            echo "<button type='submit'>Finalizar</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p style='text-align: center;'>Nenhum Produto pendente.</p>";
    }

    if (isset($message)) {
        echo "<div class='success-message'>$message</div>";
    }

    $conn->close();
    ?>

</div>

</body>
</html>
