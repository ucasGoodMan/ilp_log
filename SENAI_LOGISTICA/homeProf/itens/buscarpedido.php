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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;

        }
        body {
            font-family: "Poppins", sans-serif;
            background-color: #fff;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 20px auto;
            text-align: center;
            position: relative;
            
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            position: relative;
            top: -10px;
        }

        .produto-list {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .produto-item {
            list-style-type: none;
            padding: 20px;
            width: calc(33.333% - 20px);
            background-color: rgb(37, 91, 168);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease;
            width: 300px;
            color: white;
        }

        .produto-item:hover {
            transform: translateY(-5px);
        }

        .produto-info {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .produto-info li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .produto-info li:last-child {
            border-bottom: none;
        }

        .produto-info strong {
            color: #fff;
        }

        .back-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .back-button i {
            vertical-align: middle;
            margin-right: 5px;
        }

        @media (max-width: 900px) {
            .produto-item {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 600px) {
            .produto-item {
                width: calc(100% - 20px);
            }
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

<<<<<<< HEAD
            $conn = new mysqli($servername, $username, $password, $dbname);

=======
            
            $conn = new mysqli($servername, $username, $password, $dbname);


>>>>>>> 5b14f294469006e01ed7cdb91185118f0395bd5a
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            if (isset($_GET['pedido_id'])) {
                $pedido_id = $_GET['pedido_id'];

                $sql_produtos = "SELECT * FROM produtos WHERE pedido_id = '$pedido_id'";
                $result_produtos = $conn->query($sql_produtos);

                if ($result_produtos->num_rows > 0) {
                    while ($row_produtos = $result_produtos->fetch_assoc()) {
<<<<<<< HEAD
                        echo "<li class='produto-item'>
                                <ul class='produto-info'>
                                    <li class='produto-cod'><strong>Código:</strong> {$row_produtos['cod_prod']}</li>
                                    <li class='produto-nome'><strong>Produto:</strong> {$row_produtos['nome_produto']}</li>
                                    <li class='produto-un'><strong>Unidade:</strong> {$row_produtos['un_prod']}</li>
                                    <li class='produto-quantidade'><strong>Quantidade:</strong> {$row_produtos['qtd_prod']}</li>
                                    <li class='produto-rsunit'><strong>Preço Unitário:</strong> R$ " . number_format($row_produtos['rsunit_prod'], 2, ',', '.') . "</li>
                                    <li class='produto-ncm'><strong>NCM:</strong> {$row_produtos['ncm_prod']}</li>
                                    <li class='produto-cst'><strong>CST:</strong> {$row_produtos['cst_prod']}</li>
                                    <li class='produto-cfop'><strong>CFOP:</strong> {$row_produtos['cfop_prod']}</li>
                                </ul>
                              </li>";
=======
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
>>>>>>> 5b14f294469006e01ed7cdb91185118f0395bd5a
                    }
                } else {
                    echo "<li class='produto-item'>Nenhum produto encontrado para este pedido.</li>";
                }
            } else {
                echo "<li class='produto-item'>Erro: Pedido ID não fornecido.</li>";
            }

            $conn->close();
            ?>
        </ul>
    </div>
    <script src="sidebar.js"></script>
</body>

</html>
