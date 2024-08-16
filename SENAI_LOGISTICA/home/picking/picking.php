<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Pedidos Doca</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            color: #000000;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        h1 {
            text-align: center;
            color: rgb(37, 91, 168);
            margin-bottom: 30px;
            font-size: 28px;
        }

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .pedido-list {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        .pedido-item {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid rgb(37, 91, 168);
        }

        .pedido-info {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .pedido-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .pedido-submit {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .pedido-submit:hover {
            background-color: #1f5c9d;
        }

        .back-button {
            color: rgb(37, 91, 168);
            text-decoration: none;
            font-weight: bold;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
            margin-bottom: 30px;
            font-size: 16px;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .back-button i {
            margin-right: 10px;
            font-size: 20px;
        }

        .back-button:hover {
            color: #1f5c9d;
        }
    </style>
</head>

<body>
<?php
    include "../../sidebarALU.php";
    ?>  
    <div class="container">
        <h1>Lista de Pedidos</h1>
        <?php
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
                while ($row_pedidos = $result_pedidos->fetch_assoc()) {
                    if (isset($row_pedidos["pedido"])) {
                        $pedido = $row_pedidos["pedido"];
                        echo "<li class='pedido-item'>";
                        echo "<div class='pedido-info'>Número do Pedido: " . $pedido . "</div>";
                        echo "<div class='pedido-buttons'>";
                        echo "<form action='' method='GET'>";
                        echo "<input type='hidden' name='pedido_id' value='" . $pedido . "'>";
                        echo "<button class='pedido-submit' type='submit' formaction='buscarpedido.php'>ENVIAR PARA DOCA</button>";
                        echo "</form>";
                        echo "</div>";
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
</body>

</html>
