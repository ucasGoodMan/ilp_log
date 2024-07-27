<!-- ABRE AS REQUISIÇÕES DE MOVIMENTAÇÃO -->
<!DOCTYPE html>
<html>
<head> 
    <meta charset='UTF-8'>
    <title>Solicitações de Movimentação</title>
</head>
<body>

    <h1>Solicitações de Movimentação</h1>
    <?php
    // relacionado com o banco
    $servername = "localhost";
    $username = "root";
    $password = "root";
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

        echo "<p>Movimentação ID $movimentacao_id marcada como Concluído.</p>";
    } 

    // Consulta SQL para obter as solicitações de movimentação
    $sql = "SELECT id, npedido, produto, qtd, posicao, status FROM movimentacao";
    $result = $conn->query($sql);

    // Verifica se há resultados 
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
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
</body>
</html>