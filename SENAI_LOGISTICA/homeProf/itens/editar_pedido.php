<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Compra</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #4a90e2;
            border-bottom: 3px solid #4a90e2;
            padding-bottom: 15px;
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: 500;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group label {
            width: 100%;
            font-weight: 600;
            margin-bottom: 8px;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group select,
        .form-group textarea {
            width: 48%;
            padding: 12px 15px;
            border: 2px solid #dfe6e9;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 15px;
            background-color: #f9f9f9;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input[type="text"]:focus,
        .form-group input[type="date"]:focus,
        .form-group input[type="number"]:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 8px rgba(74, 144, 226, 0.2);
            outline: none;
        }

        .form-group textarea {
            width: 100%;
        }

        button[type="submit"],
        button.remove-btn {
            background-color: #4a90e2;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
        }

        button[type="submit"]:hover,
        button.remove-btn:hover {
            background-color: #357ab8;
            transform: translateY(-2px);
        }

        button.remove-btn {
            background-color: #e74c3c;
            padding: 10px 15px;
            font-size: 14px;
            margin-top: 10px;
        }

        button.remove-btn:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
            }

            .form-group input[type="text"],
            .form-group input[type="date"],
            .form-group input[type="number"],
            .form-group select,
            .form-group textarea,
            button[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }

            .form-group input[type="text"],
            .form-group input[type="date"],
            .form-group input[type="number"],
            .form-group select {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Pedido de Compra</h2>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "senai";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    if (isset($_POST['pedido_id'])) {
        $pedido_id = $_POST['pedido_id'];

        // Consulta para buscar os dados do pedido
        $sql_pedido = "SELECT * FROM pedidos WHERE pedido = '$pedido_id'";
        $result_pedido = $conn->query($sql_pedido);

        // Consulta para buscar os produtos do pedido
        $sql_produtos = "SELECT * FROM produtos WHERE pedidob = '$pedido_id'";
        $result_produtos = $conn->query($sql_produtos);

        if ($result_pedido->num_rows > 0 && $result_produtos->num_rows > 0) {
            $pedido = $result_pedido->fetch_assoc();

            // Exibe o formulário para editar o pedido e os produtos
            echo "<form action='salvar_edicao_pedido.php' method='POST'>";
            echo "<input type='hidden' name='pedido_id' value='" . $pedido_id . "'>";

            echo "<div class='form-group'>";
            echo "<label for='data_entrega'>Data de Entrega:</label>";
            echo "<input type='date' id='data_entrega' name='data_entrega' value='" . $pedido['data_entrega'] . "'>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label for='data_pedido'>Data do Pedido:</label>";
            echo "<input type='date' id='data_pedido' name='data_pedido' value='" . $pedido['data_pedido'] . "'>";
            echo "</div>";

            echo "<div class='form-group'>";
            echo "<label for='observacoes'>Observações:</label>";
            echo "<textarea id='observacoes' name='observacoes'>" . $pedido['observacoes'] . "</textarea>";
            echo "</div>";

            // Exibe o formulário para editar cada produto
            while ($produto = $result_produtos->fetch_assoc()) {
                echo "<div class='form-group'>";
                echo "<label for='cod_prod'>Código:</label>";
                echo "<input type='text' id='cod_prod' name='cod_prod[]' value='" . htmlspecialchars($produto['cod_prod']) . "'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='nome_produto'>Nome:</label>";
                echo "<input type='text' id='nome_produto' name='nome_produto[]' value='" . htmlspecialchars($produto['nome_produto']) . "'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='un_prod'>Unidade:</label>";
                echo "<select id='un_prod' name='un_prod[]'>";
                $unidades = ["caixa", "unidade", "peça", "kilograma", "litro", "palete", "pacote", "cartão", "rolo", "tonelada", "bloco", "saco", "fardo", "bandeja"];
                foreach ($unidades as $unidade) {
                    $selected = ($unidade == $produto['un_prod']) ? "selected" : "";
                    echo "<option value='$unidade' $selected>$unidade</option>";
                }
                echo "</select>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='qtd_prod'>Quantidade:</label>";
                echo "<input type='number' id='qtd_prod' name='qtd_prod[]' value='" . htmlspecialchars($produto['qtd_prod']) . "'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='rsunit_prod'>Preço Unitário:</label>";
                echo "<input type='text' id='rsunit_prod' name='rsunit_prod[]' value='" . htmlspecialchars($produto['rsunit_prod']) . "'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='ncm_prod'>NCM:</label>";
                echo "<input type='text' id='ncm_prod' name='ncm_prod[]' value='" . htmlspecialchars($produto['ncm_prod']) . "'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='cst_prod'>CST:</label>";
                echo "<input type='text' id='cst_prod' name='cst_prod[]' value='" . htmlspecialchars($produto['cst_prod']) . "'>";
                echo "</div>";

                echo "<div class='form-group'>";
                echo "<label for='cfop_prod'>CFOP:</label>";
                echo "<input type='text' id='cfop_prod' name='cfop_prod[]' value='" . htmlspecialchars($produto['cfop_prod']) . "'>";
                echo "</div>";

                echo "<button type='button' class='remove-btn'>Remover Produto</button>";
            }

            echo "<button type='submit'>Salvar Edição</button>";
            echo "</form>";
        } else {
            echo "Pedido ou produtos não encontrados.";
        }
    } else {
        echo "ID do pedido não fornecido.";
    }

    $conn->close();
    ?>
</div>

</body>
</html>
