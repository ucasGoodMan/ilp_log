<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Solicitação Movimentação de Pedido Depois da Conferência</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');


        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: rgb(37, 91, 140);
        }

        .back-button i {
            margin-right: 5px;
        }

        h1 {
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .header {
            margin-bottom: 20px;
        }

        .header p {
            font-size: 1.2em;
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        input[type="number"],
        input[type="text"] {
            width: 88%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: rgb(37, 91, 140);
        }

        .success {
            color: green;
            font-weight: bold;
        }

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
<a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>    <div class="container">
        <div class="header">
            <?php
            // Conexão ao banco de dados (substitua pelas suas credenciais)
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

            // Variáveis para armazenar o resultado da consulta
            $resultado = "";
            $erro = "";
            $dadosPedido = [];

            // Obtém os parâmetros GET
            $npedido = isset($_GET['npedido']) ? $_GET['npedido'] : null;
            $doca = isset($_GET['doca']) ? $_GET['doca'] : null;

            // Depuração: Exibir os valores dos parâmetros
            echo "<pre>";
            echo "pedido: " . htmlspecialchars($npedido) . "\n";
            echo "doca: " . htmlspecialchars($doca) . "\n";
            echo "</pre>";

            // Verifica se os parâmetros foram recebidos
            if (isset($npedido) && isset($doca)) {
                // Exibe o número do pedido e a doca no topo da página
                echo "<h1>Solicitar Movimentação (Depois da Vistoria)</h1>";
                echo "<p><strong>Número do Pedido:</strong> " . htmlspecialchars($npedido) . "</p>";
                echo "<p><strong>Doca:</strong> " . htmlspecialchars($doca) . "</p>";

                // Processa o formulário se foi enviado
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $produto = $_POST['produto'];
                    $qtd = $_POST['qtd'];
                    $posicao = $_POST['posicao'];

                    // Atualiza a quantidade na tabela original
                    $updateSql = "UPDATE criacaopedido SET quantidade = quantidade - ? WHERE npedido = ? AND doca = ? AND produtos = ?";
                    $updateStmt = $conn->prepare($updateSql);
                    $updateStmt->bind_param("isss", $qtd, $npedido, $doca, $produto);
                    $updateStmt->execute();

                    // Insere os dados na tabela de movimentação
                    $insertSql = "INSERT INTO movimentacao (npedido, produto, qtd, posicao) VALUES (?, ?, ?, ?)";
                    $insertStmt = $conn->prepare($insertSql);
                    $insertStmt->bind_param("ssds", $npedido, $produto, $qtd, $posicao);
                    $insertStmt->execute();

                    echo "<p class='success'>Movimentação registrada com sucesso!</p>";
                }

                // Consulta SQL para obter os dados
                $sql = "SELECT produtos, unidade, quantidade FROM criacaopedido WHERE npedido = ? AND doca = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $npedido, $doca);
                $stmt->execute();
                $result = $stmt->get_result();

                // Verifica se há resultados
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr><th>Produto</th><th>Unidade</th><th>Quantidade</th><th>Qtd</th><th>Posição</th><th>Ação</th></tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row["produtos"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["unidade"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["quantidade"]) . "</td>";
                        echo "<form method='POST'>";
                        echo "<td><input type='number' name='qtd' required></td>";
                        echo "<td><input type='text' name='posicao' required></td>";
                        echo "<td>";
                        echo "<input type='hidden' name='produto' value='" . htmlspecialchars($row["produtos"]) . "'>";
                        echo "<input type='submit' value='Registrar'>";
                        echo "</td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p class='error'>Nenhum detalhe encontrado para este pedido.</p>";
                }

                // Fecha a conexão
                $stmt->close();
            } else {
                echo "<p class='error'>Parâmetros 'npedido' ou 'doca' não fornecidos.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

</body>

</html>