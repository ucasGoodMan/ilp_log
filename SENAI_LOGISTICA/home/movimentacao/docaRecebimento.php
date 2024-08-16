<!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Pedidos Doca</title>
</head> 
<body>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        h1 {
            display: flex;
            justify-content: center;
        }
    </style>
<div class="container">
    <h1>Lista de Pedidos
        ESSA TELA NAO FUNCIONA POREM BOTEI A SIDEBAR, FIZ MINHA PARTE. PP
    </h1>
    <?php
    include "../../sidebarALU.php";
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

    // Consulta SQL para obter todos os pedidos
    $sql = "SELECT pedidob, doca FROM vistoriacarga";
    $result = $conn->query($sql);

    // Verifica se há resultados
    if ($result && $result->num_rows > 0) {  // Verifica também se a consulta foi bem-sucedida
        echo "<ul class='pedido-list'>";
        while($row = $result->fetch_assoc()) {
            echo "<li class='pedido-item'>";
            echo "<div class='pedido-info'>";
            echo "<span class='pedido-pedidob'>Número do Pedido: " . htmlspecialchars($row["pedidob"]) . "</span>"; // htmlspecialchars para evitar XSS
         //   echo "<span class='pedido-doca'>Doca: " . htmlspecialchars($row["doca"]) . "</span>";
            echo "</div>";
            echo "<form action='movimentacao.php' method='GET'>";
            echo "<input type='hidden' name='pedidob' value='" . htmlspecialchars($row["pedidob"]) . "'>";
         //   echo "<input type='hidden' name='doca' value='" . htmlspecialchars($row["doca"]) . "'>";
            echo "<input class='pedido-submit' type='submit' value='ABRIR'>";
            echo "</form>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhum pedido encontrado.";
    }

    // Fecha a conexão
    $conn->close();
    ?>
</div>
</body>
</html>
