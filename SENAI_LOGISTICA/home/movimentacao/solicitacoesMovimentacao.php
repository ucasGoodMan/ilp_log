<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Solicitações de Movimentação</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: rgb(37, 91, 140);
        }

        .back-button i {
            margin-right: 5px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        input[type="submit"] {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #2d72b7;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
<div class="container">
    <h1>Solicitações de Movimentação</h1>
    <?php
    // relacionado com o banco
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "senai";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Atualiza o status da movimentação se o formulário foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $movimentacao_id = $_POST['movimentacao_id'];
        $updateSql = "UPDATE movimentacao SET status = 'Concluído' WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $movimentacao_id);
        $updateStmt->execute();

        // Atualiza a tabela vagas com os produtos concluídos
        $produtoSql = "SELECT produto, posicao FROM movimentacao WHERE id =?";
        $produtoStmt = $conn->prepare($produtoSql);
        $produtoStmt->bind_param("i", $movimentacao_id);
        $produtoStmt->execute();
        $produtoResult = $produtoStmt->get_result();
        $produtoRow = $produtoResult->fetch_assoc();
        $produto = $produtoRow["produto"];
        $posicao = $produtoRow["posicao"];

        $vagaSql = "UPDATE vagas SET quantidade = quantidade - 1 WHERE produto =? AND posicao =?";
        $vagaStmt = $conn->prepare($vagaSql);
        $vagaStmt->bind_param("ss", $produto, $posicao);
        $vagaStmt->execute();

        echo "<p class='success'>Movimentação ID $movimentacao_id marcada como Concluído.</p>";
    } 

    // Consulta SQL para obter as solicitações de movimentação
    $sql = "SELECT id, npedido, produto, qtd, posicao, status FROM movimentacao";
    $result = $conn->query($sql);

    // Verifica se há resultados 
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Número do Pedido</th><th>Produto</th><th>Quantidade</th><th>Posição</th><th>Status</th><th>Ação</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["npedido"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["produto"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["qtd"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["posicao"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
            if ($row["status"] == "Pendente") {
                echo "<td>";
                echo "<form method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='movimentacao_id' value='" . htmlspecialchars($row["id"]) . "'>";
                echo "<input type='submit' value='Marcar como Concluída'>";
                echo "</form>";
                echo "</td>";
            } else { 
                echo "<td>Concluída</td>";  
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma solicitação de movimentação encontrada.";
    }

    // Fecha a conexão
    $conn->close();
    ?>
</div>

</body>
</html>
