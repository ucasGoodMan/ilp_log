<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../home/movimentacao/docar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Detalhes do Pedido</title>
</head>
<body>
<a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
<div class="container">
    <h1>Detalhes do Pedido</h1>
    <?php
    if (isset($_GET['pedido_id'])) {
        $pedido_id = $_GET['pedido_id'];

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "senai";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        } 

        $sql_pedido = "SELECT * FROM pedidos WHERE id = ?";
        $stmt_pedido = $conn->prepare($sql_pedido);
        $stmt_pedido->bind_param("i", $pedido_id);
        $stmt_pedido->execute();
        $result_pedido = $stmt_pedido->get_result();

        if ($result_pedido->num_rows > 0) {
            $pedido = $result_pedido->fetch_assoc();
            echo "<div class='pedido-detalhes'>";
            echo "<p>ID do Pedido: " . $pedido['id'] . "</p>";
            // Adicione mais detalhes do pedido conforme necessário
            echo "</div>";
        } else {
            echo "Pedido não encontrado.";
        }

        $stmt_pedido->close();
        $conn->close();
    } else {
        echo "Nenhum pedido selecionado.";
    }
    ?>
</div>
<script src="sidebar.js"></script>
</body>
</html>
    