<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Detalhes do Pedido</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            padding: 40px;
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        .produto-list {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }

        .produto-item {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid rgb(37, 91, 168);
        }


        .produto-info {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            color: #333;
        }

    

        .doca-section {
            margin-top: 40px;
            text-align: left;
        }

        label {
            font-weight: bold;
            color: #333;
            font-size: 16px;
        }

        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background-color: #ffffff;
            color: #333;
            font-size: 18px;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        button[type="submit"] {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 15px;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            margin-top: 20px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #1f5c9d;
        }

        .ok-button {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }

        .ok-button:hover {
            background-color: #1f5c9d;
        }

        .ok-button.clicked {
            background-color: #4caf50;
        }
    </style>
</head>

<body>
<?php
    include "../../sidebarALU.php";
    ?>  
    <div class="container">
        <div class="header">
        <h1>Detalhes do Pedido</h1>
        </div>

        <form action="buscarpedido.php" method="post">
            
            <ul class="produto-list">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
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

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $pedido_id = $_POST['pedido_id'];
                    $numero_doca = $_POST['numero_doca'];
                    $nomes_produtos = $_POST['nome_produto'];
                
                    foreach ($nomes_produtos as $nome_produto) {
                        $sql_insert = "INSERT INTO doca_pedidos (pedido_id, nome_produto, numero_doca) VALUES ('$pedido_id', '$nome_produto', '$numero_doca')";
                
                        if ($conn->query($sql_insert) !== TRUE) {
                            echo "Erro: " . $sql_insert . "<br>" . $conn->error;
                        }
                    }
                
                    echo "Solicitação de movimentação feita com sucesso!";
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

    <script>
        document.querySelectorAll('.ok-button').forEach(button => {
            button.addEventListener('click', function() {
                this.classList.toggle('clicked');
            });
        });
    </script>
    
</body>

</html>