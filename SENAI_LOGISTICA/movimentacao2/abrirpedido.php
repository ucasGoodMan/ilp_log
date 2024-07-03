<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Conexão com o banco de dados
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar pedidos da tabela 'criacaopedidos'
$sql = "SELECT id, pedido FROM criacaopedidos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Pedidos</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Pedido</th>
            <th>Ação</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["pedido"] . "</td>";
                echo "<td><button onclick=\"abrirPedido(" . $row["id"] . ")\">Abrir</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Nenhum pedido encontrado</td></tr>";
        }
        $conn->close();
        ?>
    </table>

    <script>
        function abrirPedido(id) {
            window.location.href = "pedido.php?id=" + id;
        }
    </script>
</body>
</html>
