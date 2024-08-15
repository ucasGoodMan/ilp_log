<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="docar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Pedidos Doca</title>
</head> 
<body>
<a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
<div class="container">
    <h1>Lista de Pedidos</h1>
    <?php
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
    $sql = "SELECT pedidob, doca FROM vistoriacarga";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result && $result->num_rows > 0) {  // Verifica também se a consulta foi bem-sucedida
        echo "<ul class='pedido-list'>";
        while($row = $result->fetch_assoc()) {
            echo "<li class='pedido-item'>";
            echo "<div class='pedido-info'>";
            echo "<span class='pedido-pedidob'>Número do Pedido: " . htmlspecialchars($row["pedidob"]) . "</span>"; // htmlspecialchars para evitar XSS
         //   echo "<span class='pedido-doca'>Doca: " . htmlspecialchars($row["doca"]) . "</span>";
            echo "</div>";
            echo "<form action='movimentacao.php' method='GET'>";
            echo "<input type='hidden' name='pedidob' value='" . htmlspecialchars($row["pedidob"]) . "'>";
         //   echo "<input type='hidden' name='doca' value='" . htmlspecialchars($row["doca"]) . "'>";
            echo "<input class='pedido-submit' type='submit' value='ABRIR'>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum pedido encontrado.";
    }

    // Fecha a conexão
    $conn->close();
    ?>
</div>
<script src="sidebar.js"></script>
</body>
</html>
