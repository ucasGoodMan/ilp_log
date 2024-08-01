<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela 2 - Expedição</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #f0f0f0;
            padding: 20px;
            border: 2px solid #ccc;
        }

        h1 { 
            text-align: center;
            color: black;
        }

        .grid {
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 10px;
        }

        .row {
            display: contents;
        }

        .label, .label2 {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        button {
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover {
            background-color: rgb(29, 70, 130);
        }

        .produto-grid {
            display: grid;
            grid-template-columns: auto auto auto auto;
            gap: 5px;
            margin-top: 10px;
        }

        .produto-header, .produto-item {
            padding: 10px;
            border: 1px solid #ccc;
            background-color: white;
        }

        .produto-header {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .status-ok {
            background-color: rgb(37, 91, 168);
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .status-ok:hover {
            background-color: rgb(29, 70, 130);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tela 2 - Expedição</h1>
        <?php
        // Verificar se a variável 'solicitacao' está definida
        if (!isset($_POST['solicitacao']) || empty($_POST['solicitacao'])) {
            die('Solicitação não foi enviada.');
        }

        $solicitacao = $_POST['solicitacao'];

        // Conectar ao banco de dados
        $conn = new mysqli("localhost", "root", "root", "senai");

        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Buscar os dados do pedido
        $sql = "SELECT p.cod_prod, p.nome_produto, p.un_prod, p.qtd_prod, ped.data_entrega, ped.data_pedido
                FROM produto p
                JOIN pedidos ped ON p.pedidob = ped.pedido
                WHERE p.pedidob = ?";
        $stmt = $conn->prepare($sql);

        // Verificar se a preparação da consulta foi bem-sucedida
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $conn->error);
        }

        $stmt->bind_param("s", $solicitacao);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<form method='POST' action='salvar_doca.php'>";
            echo "<div class='grid'>";
            echo "<div class='row'>";
            echo "<span class='label'>Solicitação nº</span>";
            echo "<input type='text' name='solicitacao' value='$solicitacao' readonly>";
            echo "</div>";
            echo "</div>";
            echo "<div class='produto-grid'>";
            echo "<div class='produto-header'>Produtos da Solicitação</div>";
            echo "<div class='produto-header'>UN</div>";
            echo "<div class='produto-header'>QTD</div>";
            echo "<div class='produto-header'>Data Pedido</div>";
            echo "<div class='produto-header'>Data Entrega</div>";
            echo "<div class='produto-header'>Status</div>";

            while ($row = $result->fetch_assoc()) {
                echo "<input class='produto-item' type='text' value='" . $row["nome_produto"] . "' readonly>";
                echo "<input class='produto-item' type='text' value='" . $row["un_prod"] . "' readonly>";
                echo "<input class='produto-item' type='text' value='" . $row["qtd_prod"] . "' readonly>";
                echo "<input class='produto-item' type='text' value='" . $row["data_pedido"] . "' readonly>";
                echo "<input class='produto-item' type='text' value='" . $row["data_entrega"] . "' readonly>";
                echo "<button class='produto-item status-ok' type='button'>OK</button>";
            }

            echo "</div>";
            echo "<div class='grid' style='margin-top: 20px;'>";
            echo "<div class='row'>";
            echo "<span class='label'>Enviado para qual doca de saída?</span>";
            echo "<span class='label2'>Doca:</span>";
            echo "<input type='text' name='doca'>";
            echo "</div>";
            echo "<div class='row'>";
            echo "<button type='submit'>Pedido OK na doca</button>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p>Nenhum pedido encontrado para a solicitação nº $solicitacao.</p>";
        }

        $stmt->close();
        $conn->close();
        ?>
    </div>
</body>
</html>
