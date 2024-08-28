<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Despacho de Produtos</title>
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

        .container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            padding: 40px;
            background: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 6px;
            text-align: center; /* Centraliza o texto */
        }

        th {
            background-color: #f2f2f2;
            color: black;
        }

        input[type="submit"] {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2d72b7;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <?php
    include "../../sidebarALU.php";
    ?>
    <div class="container">
        <div class="header">
        <h1>Despacho de Produtos</h1>
        </div>
        <?php
        // Conexão com o banco de dados
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

        // Atualiza o status da movimentação se o formulário foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $doca_id = $_POST['doca_id'];
            $updateSql = "UPDATE doca_pedidos SET status = 'Concluido' WHERE id = ?";
            $updateStmt = $conn->prepare($updateSql);
            $updateStmt->bind_param("i", $doca_id);
            $updateStmt->execute();

            echo "<p class='success'>Movimentação ID $doca_id marcada como Concluída.</p>";
        } 

        // Consulta SQL para obter os pedidos pendentes de movimentação
        $sql = "SELECT id, pedido_id, nome_produto, numero_doca, status FROM doca_pedidos WHERE status = 'Pendente'";
        $result = $conn->query($sql);

        // Verifica se há resultados 
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Número do Pedido</th><th>Nome do Produto</th><th>Número da Doca</th><th>Status</th><th>Ação</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["pedido_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["nome_produto"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["numero_doca"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["status"]) . "</td>";
                echo "<td>";
                echo "<form method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='doca_id' value='" . htmlspecialchars($row["id"]) . "'>";
                echo "<input type='submit' value='Marcar como Concluída'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p style='text-align: center;'>Nenhuma movimentação pendente encontrada.</p>";

        }

        // Fecha a conexão
        $conn->close();
        ?>
    </div>
</body>
</html>
