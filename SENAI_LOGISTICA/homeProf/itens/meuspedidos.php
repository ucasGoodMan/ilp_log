<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Pedidos Doca</title>
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
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            background: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 12px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: rgb(37, 91, 168);
            font-size: 28px;
            margin: 0;
        }

        .pedido-list {
            list-style-type: none;
            padding: 0;
        }

        .pedido-item {
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pedido-info {
            font-size: 18px;
            color: #333;
        }

        .pedido-buttons form {
            display: inline;
        }

        .pedido-submit {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px 15px;
            margin: 0 5px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .pedido-submit:hover {
            background-color: #2d72b7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <h1>Lista de Pedidos</h1>
    </div>
        <?php
        include "../../sidebarPROF.php";
        $servername = "localhost";
        $username = "root";
        $password = ""; 
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
                        echo "<div class='pedido-buttons'>";
                        echo "<form action='' method='GET'>";
                        echo "<input type='hidden' name='pedido_id' value='" . $pedido . "'>";
                        echo "<button class='pedido-submit' type='submit' formaction='buscarpedido.php'>ABRIR</button>";
                        echo "<button class='pedido-submit' type='submit' formaction='danfe.php'>DANFE</button>";
                        echo "</form>";
                        echo "<form action='' method='POST' onsubmit='return confirm(\"Tem certeza?\");'>";
                        echo "<input type='hidden' name='pedido_id' value='" . $pedido . "'>";
                        echo "<button class='pedido-submit' type='submit' formaction='deletar_pedido.php'>APAGAR</button>";
                        echo "<button class='pedido-submit' type='submit' formaction='editar_pedido.php'>ALTERAR</button>";
                        echo "</form>";
                        echo "</div>";
                        echo "</li>";
                    } else {
                        echo "Dados do pedido não encontrados.";
                    }
                }
                echo "</ul>";
            } else {
                echo "<p style='text-align: center;'>Nenhum pedido encontrado.</p>";
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
