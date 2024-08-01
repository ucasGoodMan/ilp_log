<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../home/movimentacao/docar.css">
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

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$sql_pedidos = "SELECT DISTINCT pedidos.pedido 
                FROM pedidos 
                JOIN produtos ON pedidos.pedido = produtos.pedidob";
$result_pedidos = $conn->query($sql_pedidos);

if ($result_pedidos) {
    if ($result_pedidos->num_rows > 0) {
        echo "<ul class='pedido-list'>";
        while($row_pedidos = $result_pedidos->fetch_assoc()) {
            if (isset($row_pedidos["pedido"])) {
                $pedido = $row_pedidos["pedido"];
                echo "<li class='pedido-item'>";
                echo "<div class='pedido-info'>";
                echo "<span class='pedido-idpedido'>Número do Pedido: " . $pedido . "</span>";
                echo "</div>";
                echo "<form action='' method='GET'>";
                echo "<input type='hidden' name='pedido_id' value='" . $pedido . "'>";
                echo "<button class='pedido-submit' type='submit' formaction='buscarpedido.php'>ABRIR</button>";
                echo "<button class='pedido-submit' type='submit' formaction='danfe.php'>DANFE</button>";
                echo "</form>";
                echo "</li>";
            } else {
                echo "Dados do pedido não encontrados.";
            }
        }
        echo "</ul>";
    } else {
        echo "Nenhum pedido encontrado.";
    }
} else {
    echo "Erro na execução da consulta: " . $conn->error;
}

$conn->close();
?>

</div>
<script src="sidebar.js"></script>
</body>
</html>
