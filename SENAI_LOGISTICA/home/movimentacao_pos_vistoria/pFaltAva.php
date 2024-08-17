<!DOCTYPE html>
<html>
<head>
    <title>Produtos Faltando/Avariados</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Produtos Faltando/Avariados</h1>
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

    // Consulta para pegar produtos faltando ou avariados
    $sql = "SELECT * FROM pfaltava";
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na execução da consulta SELECT: " . $conn->error);
    }

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Produto ID</th><th>Nome do Produto</th><th>Quantidade</th><th>Status</th><th>Data Registro</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["produto_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nome_produto"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["quantidade"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["data_registro"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nenhum produto faltando ou avariado encontrado.";
    }

    $conn->close();
    ?>
</body>
</html>
