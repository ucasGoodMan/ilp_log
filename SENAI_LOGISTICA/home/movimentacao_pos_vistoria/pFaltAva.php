<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos Faltando/Avariados</title>

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

    // Consulta para pegar produtos que estão faltando ou avariados
    $sql = "SELECT id, pedidob, nome_produto, qtd_prod, avariado, faltando, observacoes FROM vistoriacarga WHERE avariado = 1 OR faltando = 1";
    $result = $conn->query($sql);

    // Verifica se a consulta foi bem-sucedida
    if ($result === false) {
        die("Erro na execução da consulta SELECT: " . $conn->error);
    }

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Código do Produto</th><th>Nome do Produto</th><th>Quantidade</th><th>Avariado</th><th>Faltando</th><th>Observações</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["pedidob"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nome_produto"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["qtd_prod"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["avariado"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["faltando"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["observacoes"]) . "</td>";
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
