<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../home/movimentacao/docar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Detalhes do Pedido</title>
    <style>
        .container {
            text-align: center;
            margin-top: 20px;
        }

        .produto-list {
            list-style-type: none;
            padding: 250px;
            margin-top: 20px;
            text-align: left;
            display: inline-block;
        }

        .produto-item {
            margin-bottom: 15px;
        }

        .produto-info {
            list-style-type: none;
            padding: 0px;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
        }

        .doca-section {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
    <div class="container">
        <h1>Detalhes do Pedido</h1>
        <form action="processar_doca.php" method="post">
            <ul class="produto-list">
                <?php
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

                // Verifica se o ID do pedido foi fornecido
                if (isset($_GET['pedido_id'])) {
                    $pedido_id = $_GET['pedido_id'];

                    // Consulta para buscar os produtos do pedido
                    $sql_produtos = "SELECT * FROM produtos WHERE pedidob = '$pedido_id'";
                    $result_produtos = $conn->query($sql_produtos);

                    if ($result_produtos) {
                        if ($result_produtos->num_rows > 0) {
                            while ($row_produtos = $result_produtos->fetch_assoc()) {
                                $nome_produto = htmlspecialchars($row_produtos["nome_produto"]);
                                echo "<li class='produto-item'>";
                                echo "  <ul class='produto-info'>";
                                echo "    <li class='produto-codigo'>Código: " . htmlspecialchars($row_produtos["cod_prod"]) . "</li>";
                                echo "    <li class='produto-nome'>Produto: " . $nome_produto . "</li>";
                                echo "    <input type='hidden' name='nome_produto[]' value='" . $nome_produto . "'>";
                                echo "    <li><button type='button' class='ok-button'>Ok</button></li>";
                                echo "  </ul>"; 
                                echo "</li>"; 
                            }
                        } else {
                            echo "<li>Nenhum produto encontrado para este pedido.</li>";
                        }
                    } else {
                        echo "<li>Erro na execução da consulta: " . $conn->error . "</li>";
                    }
                } else {
                    echo "<li>Erro: Pedido ID não fornecido.</li>";
                }

                // Fecha a conexão
                $conn->close();
                ?>
            </ul>
            <div class="doca-section">
                <label for="numero_doca">Número da Doca:</label>
                <input type="number" id="numero_doca" name="numero_doca" required>
                <input type="hidden" name="pedido_id" value="<?php echo $pedido_id; ?>">
                <button type="submit">Cadastrar Doca</button>
            </div>
        </form>
    </div>
    <script src="sidebar.js"></script>
</body>

</html>
