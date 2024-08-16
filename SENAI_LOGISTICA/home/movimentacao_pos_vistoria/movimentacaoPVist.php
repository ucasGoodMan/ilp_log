<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai";

// Conexão ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta SQL para obter os produtos sem avarias ou faltando
$sql = "SELECT * FROM vistoriacarga WHERE avariado = 0 AND faltando = 0";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Movimentação de Produtos</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 10px;
        }

        .header h1 {
            color: rgb(37, 91, 168);
            font-size: 28px;
            margin: 0;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .produto-item {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 10px;
        }

        .produto-item h3 {
            font-size: 18px;
            color: rgb(37, 91, 168);
            margin: 0;
        }

        .produto-item p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .produto-item button {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .produto-item button:hover {
            background-color: #218838;
        }

        .no-results {
            text-align: center;
            color: #777;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Movimentação de Produtos</h1>
        </div>
        <?php
        include "../../sidebarALU.php";
        if ($result->num_rows > 0) {
            echo "<div class='grid'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='produto-item'>";
                echo "<h3>" . htmlspecialchars($row["nome_produto"]) . "</h3>";
                echo "<p>Pedido: " . htmlspecialchars($row["pedidob"]) . "</p>";
                echo "<p>Quantidade: " . htmlspecialchars($row["qtd_prod"]) . "</p>";
                echo "<form action='update.php' method='post'>";
                echo "<input type='hidden' name='id' value='" . htmlspecialchars($row["id"]) . "'>";
                echo "<button type='submit'>Pegar</button>";
                echo "</form>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<div class='no-results'>Nenhum produto encontrado.</div>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
