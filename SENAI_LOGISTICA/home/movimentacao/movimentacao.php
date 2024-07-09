<!DOCTYPE html>

        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>solicitação movimentação de pedido depois da conferencia</title>
        </head>
        <body>
            
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

        // Obtém os parâmetros GET
        $npedido = $_GET['nPedido'];
        $doca = $_GET['doca'];

        // Verifica se os parâmetros foram recebidos
        if (isset($npedido) && isset($doca)) {
            // Exibe o número do pedido e a doca no topo da página
            echo "<h1>solicitar movimentaçao (depois da vistoria)</h1>";
            echo "<p><strong>Número do Pedido:</strong> " . htmlspecialchars($nPedido) . "</p>";
            echo "<p><strong>Doca:</strong> " . htmlspecialchars($doca) . "</p>";
            
            // Processa o formulário se foi enviado
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $produto = $_POST['produto'];
                $qtd = $_POST['qtd'];
                $posicao = $_POST['posicao'];

                // Atualiza a quantidade na tabela original
                $updateSql = "UPDATE criacaopedido SET quantidade = quantidade - ? WHERE npedido = ? AND doca = ? AND produtos = ?";
                $updateStmt = $conn->prepare($updateSql);
                $updateStmt->bind_param("isss", $qtd, $nPedido, $doca, $produto);
                $updateStmt->execute();

                // Insere os dados na tabela de movimentação
                $insertSql = "INSERT INTO movimentacao (npedido, produto, qtd, posicao) VALUES (?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertSql);
                $insertStmt->bind_param("ssds", $npedido, $produto, $qtd, $posicao);
                $insertStmt->execute();

                echo "<p>Movimentação registrada com sucesso!</p>";
            }

            // Consulta SQL para obter os dados
            $sql = "SELECT produtos, unidade, quantidade FROM criacaopedido WHERE npedido = ? AND doca = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $npedido, $doca);
            $stmt->execute();
            $result = $stmt->get_result();

            // Verifica se há resultados
            if ($result->num_rows > 0) {
                echo "<table border='1'>";
                echo "<tr><th>Produto</th><th>Unidade</th><th>Quantidade</th><th>Qtd</th><th>Posicao</th><th>Acao</th></tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["produtos"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["unidade"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["quantidade"]) . "</td>";
                    echo "<form method='POST'>";
                    echo "<td><input type='number' name='qtd' required></td>";
                    echo "<td><input type='text' name='posicao' required></td>";
                    echo "<td>";
                    echo "<input type='hidden' name='produto' value='" . htmlspecialchars($row["produtos"]) . "'>";
                    echo "<input type='submit' value='Registrar'>";
                    echo "</td>";
                    echo "</form>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Nenhum detalhe encontrado para este pedido.";
            }

            // Fecha a conexão
            $stmt->close();
        } else {
            echo "Parâmetros 'npedido' ou 'doca' não fornecidos.";
        }

        $conn->close();
        ?>
        </body>
        </html>

