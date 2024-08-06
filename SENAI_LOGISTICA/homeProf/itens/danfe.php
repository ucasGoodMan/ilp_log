<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../home/movimentacao/docar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'>
    <title>Detalhes do Pedido</title>
    <style>
        .container {
            text-align: center;
            margin-top: 20px;
            padding-left: 20px;
            padding-right: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            padding-left: 20px; /* Adiciona espaço à esquerda das células */
            padding-right: 20px; /* Adiciona espaço à direita das células */
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .despachante-info {
            text-align: left;
            margin-top: 20px;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .despachante-info p {
            margin: 5px 0;
        }

        .header {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <?php
            // Define o fuso horário
            date_default_timezone_set('America/Sao_Paulo');

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
                echo "<p>Pedido Número: " . htmlspecialchars($pedido_id) . "</p>";

                // Verifica se o formulário foi submetido
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $cod_danfe = $_POST['cod_danfe'];
                    $chave_acesso_danfe = $_POST['chave_acesso_danfe'];
                    $data_emissao = date('Y-m-d');
                    $data_entrega = $_POST['data_entrega'];

                    // Insere os dados na tabela detalhes_danfe
                    $sql_insert = "INSERT INTO detalhes_danfe (pedido_id, cod_danfe, chave_acesso_danfe, data_emissao, data_entrega) VALUES ('$pedido_id', '$cod_danfe', '$chave_acesso_danfe', '$data_emissao', '$data_entrega')";

                    if ($conn->query($sql_insert) === TRUE) {
                        echo "<p>Dados inseridos com sucesso!</p>";
                    } else {
                        echo "<p>Erro ao inserir dados: " . $conn->error . "</p>";
                    }
                }

                // Exibe o formulário
                echo '<form method="POST">';
                echo '<label for="cod_danfe">Código da DANFE:</label>';
                echo '<input type="text" id="cod_danfe" name="cod_danfe" value="32415" required>';

                echo '<label for="chave_acesso_danfe">Chave de Acesso da DANFE:</label>';
                echo '<input type="text" id="chave_acesso_danfe" name="chave_acesso_danfe" value="928382372837429202837785484684652484" required>';

                echo '<label for="data_emissao">Data de Emissão:</label>';
                echo '<input type="text" id="data_emissao" name="data_emissao" value="' . date('d/m/Y') . '" readonly>';

                echo '<label for="data_entrega">Data de Entrega:</label>';
                echo '<input type="date" id="data_entrega" name="data_entrega" required>';

                echo '<input type="submit" value="Salvar">';
                echo '</form>';

                // Consulta para buscar os produtos do pedido
                $sql_produtos = "SELECT * FROM produtos WHERE pedidob = '$pedido_id'";
                $result_produtos = $conn->query($sql_produtos);

                if ($result_produtos) {
                    if ($result_produtos->num_rows > 0) {
                        echo "<table>";
                        echo "<tr>
                                <th>Código</th>
                                <th>Produto</th>
                                <th>Unidade</th>
                                <th>Quantidade</th>
                                <th>Preço Unitário</th>
                                <th>NCM</th>
                                <th>CST</th>
                                <th>CFOP</th>
                              </tr>";
                        while ($row_produtos = $result_produtos->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row_produtos["cod_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["nome_produto"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["un_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["qtd_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["rsunit_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["ncm_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["cst_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["cfop_prod"]) . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>Nenhum produto encontrado para este pedido.</p>";
                    }
                } else {
                    echo "<p>Erro na execução da consulta: " . $conn->error . "</p>";
                }
            } else {
                echo "<p>Erro: Pedido ID não fornecido.</p>";
            }

            // Fecha a conexão
            $conn->close();
            ?>
        </div>
        
        <!-- Informações do Despachante -->
        <div class="despachante-info">
            <h2>Despachante</h2>
            <p>CNPJ: 03.389.993/0001-23</p>
            <p>Telefone: (47) 3247-9763</p>
            <p>CEP: 88.304-101</p>
            <p>Bairro: São João</p>
            <p>Rua: Heitor Liberato</p>
            <p>Cidade: Itajaí</p>
            <p>Estado: SC</p>
        </div>
    </div>
    <script src="sidebar.js"></script>
</body>

</html>
