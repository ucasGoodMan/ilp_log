<?php
include 'db_connect.php';

// Inicialize as variáveis de filtro com valores padrão
$nome_produto = isset($_GET['nome_produto']) ? $_GET['nome_produto'] : '';
$cod_prod = isset($_GET['cod_prod']) ? $_GET['cod_prod'] : '';
$un_prod = isset($_GET['un_prod']) ? $_GET['un_prod'] : '';
$quantidade = isset($_GET['quantidade']) ? $_GET['quantidade'] : '';
$posicao_estoque = isset($_GET['posicao_estoque']) ? $_GET['posicao_estoque'] : '';

// Crie a consulta SQL com base nos filtros
$sql = "SELECT * FROM movimentacaopvist WHERE 1=1";

if ($nome_produto != '') {
    $sql .= " AND nome_produto LIKE '%" . $conn->real_escape_string($nome_produto) . "%'";
}
if ($cod_prod != '') {
    $sql .= " AND produto_id = '" . $conn->real_escape_string($cod_prod) . "'";
}
if ($un_prod != '') {
    $sql .= " AND un_prod = '" . $conn->real_escape_string($un_prod) . "'";
}
if ($quantidade != '') {
    $sql .= " AND quantidade = '" . $conn->real_escape_string($quantidade) . "'";
}
if ($posicao_estoque != '') {
    $sql .= " AND posicao_estoque = '" . $conn->real_escape_string($posicao_estoque) . "'";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventário de Estoque</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        /* Estilos gerais para o corpo da página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: auto;
            overflow-x: hidden;
            /* Evita rolagem no iframe */
        }

        /* Estilos para o formulário de filtro */
        .filter-form {
            margin: 10px;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .filter-form label {
            display: block;
            margin-bottom: 5px;
        }

        .filter-form input[type="text"],
        .filter-form input[type="number"] {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .filter-form button {
            background-color: rgb(37, 91, 168);
            ;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .filter-form button:hover {
            background-color: #0056b3;
        }

        /* Estilos para a tabela */
        table {
            width: 75%;
            border-collapse: collapse;
            margin: 55px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }

        th {
            background-color: rgb(37, 91, 168);
            ;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        tr:nth-child(even) td {
            background-color: #f2f2f2;
        }

        tr:hover td {
            background-color: #e9ecef;
        }

        /* Ajuste do tamanho da tabela e do formulário para se adequar ao iframe */
        @media screen and (max-width: 600px) {

            .filter-form,
            table {
                font-size: 12px;
                padding: 8px;
            }

            th,
            td {
                padding: 6px;
            }
        }
    </style>
</head>

<body>
    <h1>Itens em Estoque</h1>

    <!-- Formulário de Filtro -->
    <form class="filter-form" method="get" action="">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" id="nome_produto" name="nome_produto" value="<?php echo htmlspecialchars($nome_produto); ?>">

        <label for="cod_prod">Código do Pedido:</label>
        <input type="text" id="cod_prod" name="cod_prod" value="<?php echo htmlspecialchars($cod_prod); ?>">

        <label for="un_prod">Unidade:</label>
        <input type="text" id="un_prod" name="un_prod" value="<?php echo htmlspecialchars($un_prod); ?>">

        <label for="quantidade">Quantidade:</label>
        <input type="number" id="quantidade" name="quantidade" value="<?php echo htmlspecialchars($quantidade); ?>">

        <label for="posicao_estoque">Posição:</label>
        <input type="text" id="posicao_estoque" name="posicao_estoque" value="<?php echo htmlspecialchars($posicao_estoque); ?>">

        <button type="submit">Filtrar</button>
    </form>

    <!-- Tabela de Resultados -->
    <table>
        <thead>
            <tr>
                <th>pedido Nº</th>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Posição no Estoque</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Saída de cada linha
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td data-label='Produto ID'>" . $row["produto_id"] . "</td>
                            <td data-label='Nome do Produto'>" . $row["nome_produto"] . "</td>
                            <td data-label='Quantidade'>" . $row["quantidade"] . "</td>
                            <td data-label='Posição no Estoque'>" . $row["posicao_estoque"] . "</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='no-results'>Nenhum item encontrado</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>

</html>