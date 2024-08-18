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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding: 40px;
            background: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 12px;
            text-align: center;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: rgb(37, 91, 168);
            font-size: 28px;
            margin: 0;
        }

        .produto-list {
            list-style-type: none;
            padding: 0;
            margin: 0 auto;
            text-align: left;
            max-width: 600px;
        }

        .produto-item {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }

        .produto-info {
            list-style-type: none;
            padding: 0;
            margin: 0;
            font-size: 16px;
            color: #333;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #2d72b7;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
        <h1>Detalhes do Pedido</h1>
         </div>
        <ul class="produto-list">
            <?php
            include "../../sidebarPROF.php";
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
                            echo "<li class='produto-item'>";
                            echo "  <ul class='produto-info'>";
                            echo "    <li class='produto-codigo'>Código: " . htmlspecialchars($row_produtos["cod_prod"]) . "</li>";
                            echo "    <li class='produto-nome'>Produto: " . htmlspecialchars($row_produtos["nome_produto"]) . "</li>";
                            echo "    <li class='produto-un'>Unidade: " . htmlspecialchars($row_produtos["un_prod"]) . "</li>";
                            echo "    <li class='produto-quantidade'>Quantidade: " . htmlspecialchars($row_produtos["qtd_prod"]) . "</li>";
                            echo "    <li class='produto-rsunit'>Preço Unitário: " . htmlspecialchars($row_produtos["rsunit_prod"]) . "</li>";
                            echo "    <li class='produto-ncm'>NCM: " . htmlspecialchars($row_produtos["ncm_prod"]) . "</li>";
                            echo "    <li class='produto-cst'>CST: " . htmlspecialchars($row_produtos["cst_prod"]) . "</li>";
                            echo "    <li class='produto-cfop'>CFOP: " . htmlspecialchars($row_produtos["cfop_prod"]) . "</li>";
                            echo "  </ul>";
                            echo "</li>";
                        }
                    } else {
                        echo "<li class='produto-item'>Nenhum produto encontrado para este pedido.</li>";
                    }
                } else {
                    echo "<li class='produto-item'>Erro na execução da consulta: " . $conn->error . "</li>";
                }
            } else {
                echo "<li class='produto-item'>Erro: Pedido ID não fornecido.</li>";
            }

            // Fecha a conexão
            $conn->close();
            ?>
        </ul>
    </div>
    <script src="sidebar.js"></script>
</body>

</html>
