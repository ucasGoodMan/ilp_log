
<!DOCTYPE html>

<html lang='pt-br'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos Doca</title>
   
</head> 
<body>
    <h1>Lista de Pedidos</h1>
    <?php
    //relacionado a pedidos
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

    // Consulta SQL para obter todos os pedidos
    $sql = "SELECT npedido, doca FROM criacaopedido";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Número do Pedido</th><th>Doca</th><th>Ação</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["npedido"] . "</td>";
            echo "<td>" . $row["doca"] . "</td>";
            echo "<td><form action='movimentacao.php' method='GET' style='display:inline;'>";
            echo "<input type='hidden' name='npedido' value='" . $row["npedido"] . "'>";
            echo "<input type='hidden' name='doca' value='" . $row["doca"] . "'>";
            echo "<input type='submit' value='ABRIR'>";
            echo "</form></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum pedido encontrado.";
    }

    // Fecha a conexão
    $conn->close();
    ?>
</body>
</html>
