<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido de Compra</title>
    <style>
        /* Estilo global da página */
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

        /* Container principal */
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 800px;
            height: 80vh; /* Limita a altura do container */
            overflow-y: auto; /* Adiciona a barra de rolagem vertical */
            margin: 20px;
        }

        /* Estilo da barra de rolagem */
        .container::-webkit-scrollbar {
            width: 10px;
        }

        .container::-webkit-scrollbar-track {
            background: #f2f2f2;
            border-radius: 6px;
        }

        .container::-webkit-scrollbar-thumb {
            background-color: rgb(37, 91, 168);
            border-radius: 6px;
            border: 2px solid #ffffff;
        }

        /* Cabeçalho */
        h2 {
            color: rgb(37, 91, 168);
            text-align: center;
            margin-bottom: 20px;
        }

        /* Estilo dos grupos de formulário */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: rgb(37, 91, 168);
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="date"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
        }

        /* Botões de ação */
        button[type="submit"],
        .remove-btn {
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }

        button[type="submit"]:hover,
        .remove-btn:hover {
            background-color: #2d72b7;
        }

        .remove-btn {
            background-color: red;
            margin-top: 10px;
            float: right;
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
