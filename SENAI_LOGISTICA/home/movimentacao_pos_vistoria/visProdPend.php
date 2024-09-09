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

// Atualiza o status para "concluído" e a posição no estoque quando o usuário clica em "finalizar"
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["posicao"])) {
    $id = $_POST["id"];
    $posicao = $_POST["posicao"];
    $sql = "UPDATE movimentacaopvist SET status = 'concluido', posicao_estoque = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $posicao, $id);
    $stmt->execute();
}

// Consulta SQL para obter os produtos pendentes
$sql = "SELECT * FROM movimentacaopvist WHERE status = 'pendente'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Produtos Pendentes</title>
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

        select {
            border: 1px solid #ccc;
            background: #fff;
            padding: 8px 12px;
            width: 100%;
            max-width: 150px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            appearance: none; /* Remove o estilo padrão do navegador */
            cursor: pointer;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        select:focus {
            border-color: rgb(37, 91, 168);
            box-shadow: 0 0 5px rgba(37, 91, 168, 0.5);
            outline: none;
        }

        button {
            background: rgb(37, 91, 168);
            border: none;
            color: white;
            width: 10%;
                

        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
    <h1>Produtos Pendentes</h1>
    </div>
    <?php
    include "../../sidebarALU.php";
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Produto ID</th><th>Nome do Produto</th><th>Quantidade</th><th>Posição no Estoque</th><th>Ação</th></tr>";
        
        // Data rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["produto_id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nome_produto"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["quantidade"]) . "</td>";
            echo "<td>";
            echo "<form action='visProdPend.php' method='post'>";
            echo "<input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>";
            echo "<select name='posicao'>";
            for ($letra = 'A'; $letra <= 'E'; $letra++) {
                for ($numero = 1; $numero <= 5; $numero++) {
                    $valor = $letra . $numero;
                    echo "<option value='$valor'>$valor</option>";
                }
            }
            echo "</select>";
            echo "</td>";
            echo "<td>";
            echo "<input type='submit' value='Finalizar'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p class='success'>Operação finalizada com sucesso!</p>";
        echo "<p style='text-align: center;'>Nenhum produto pendente encontrado.</p>";
        echo "<div style='text-align: center;'>
                <button onclick=\"window.location.href='http://localhost/ilp_log/SENAI_LOGISTICA/home/movimentacao_pos_vistoria/movimentacaoPVist.php'\">Voltar</button>
              </div>";
    }
    
        
    
    $conn->close();
    ?>
</div>

</body>
</html>
