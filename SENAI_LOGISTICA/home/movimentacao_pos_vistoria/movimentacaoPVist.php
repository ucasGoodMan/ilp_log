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

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<div class='grid'>";
        echo "<div class='produto-header'>Pedido B</div>";
        echo "<div class='produto-header'>Nome do Produto</div>";
        echo "<div class='produto-header'>QTD</div>";
        echo "<div class='produto-header'>Ação</div>";

        while ($row = $result->fetch_assoc()) {
            echo "<div class='produto-item'>";
            echo "<input type='text' value='" . $row["pedidob"] . "'>";
            echo "<input type='text' value='" . $row["nome_produto"] . "'>";
            echo "<input type='number' value='" . $row["qtd_prod"] . "'>";
            echo "<form action='update.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<button class='produto-item status-ok' type='submit'>Pegar</button>";
            echo "</form>";
            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "Nenhum produto encontrado.";
    }

    $conn->close();
    ?>