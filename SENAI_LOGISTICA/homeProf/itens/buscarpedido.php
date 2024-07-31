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
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
        }
        .info-danfe{
            
        }
    </style>
</head>

<body>
    <a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
    <div class="container">
        <h1>Detalhes do Pedido</h1>
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

            // Obtém o pedido_id da URL e verifica se está definido
            if (isset($_GET['pedido_id'])) {
                $pedido_id = $_GET['pedido_id'];

                // Consulta SQL para obter os produtos do pedido
                $sql_produtos = "SELECT * FROM produtos WHERE pedido_id = '$pedido_id'";
                $result_produtos = $conn->query($sql_produtos);

                // Verifica se há resultados
                if ($result_produtos->num_rows > 0) {
                    // Loop através dos produtos do pedido
                    while ($row_produtos = $result_produtos->fetch_assoc()) {
                        echo "<li class='produto-item'>";
                        echo "  <ul class='produto-info'>";
                        echo "    <li class='produto-cod'>Código: " . $row_produtos["cod_prod"] . "</li>";
                        echo "    <li class='produto-nome'>Produto: " . $row_produtos["nome_produto"] . "</li>";
                        echo "    <li class='produto-un'>Unidade: " . $row_produtos["un_prod"] . "</li>";
                        echo "    <li class='produto-quantidade'>Quantidade: " . $row_produtos["qtd_prod"] . "</li>";
                        echo "    <li class='produto-rsunit'>Preço Unitário: " . $row_produtos["rsunit_prod"] . "</li>";
                        echo "    <li class='produto-ncm'>NCM: " . $row_produtos["ncm_prod"] . "</li>";
                        echo "    <li class='produto-cst'>CST: " . $row_produtos["cst_prod"] . "</li>";
                        echo "    <li class='produto-cfop'>CFOP: " . $row_produtos["cfop_prod"] . "</li>";
                        echo "  </ul>"; 
                        echo "</li>"; 
                    }
                } else {
                    echo "<li>Nenhum produto encontrado para este pedido.</li>";
                }
            } else {
                echo "<li>Erro: Pedido ID não fornecido.</li>";
            }

            // Fecha a conexão
            $conn->close();
            ?>
        </ul>
    </div>
    <script src="sidebar.js"></script>
</body>

</html>
