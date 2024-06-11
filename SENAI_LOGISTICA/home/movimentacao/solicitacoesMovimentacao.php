<!DOCTYPE html>
<html>
<head>
    <title>Solicitacoes de Movimentacao</title>
</head>
<body>
    <h1>Solicitacoes de Movimentacao</h1>
    <?php
    // Conexão ao banco de dados (substitua pelas suas credenciais)
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
        $updateSql = "UPDATE movimentacao SET status = 'Concluido' WHERE id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("i", $movimentacao_id);
        $updateStmt->execute();
        echo "<p>Movimentação ID $movimentacao_id marcada como concluida.</p>";
    }

    // Consulta SQL para obter as solicitações de movimentação
    $sql = "SELECT id, npedido, produto, qtd, posicao, status FROM movimentacao";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Numero do Pedido</th><th>Produto</th><th>Quantidade</th><th>Posicao</th><th>Status</th><th>Acao</th></tr>";
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
                echo "<input type='submit' value='Marcar como Concluida'>";
                echo "</form>";
                echo "</td>";
            } else {
                echo "<td>Concluida</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma solicitação de movimentacao encontrada.";
    }

    // Fecha a conexão
    $conn->close();
    ?>
</body>
</html>
