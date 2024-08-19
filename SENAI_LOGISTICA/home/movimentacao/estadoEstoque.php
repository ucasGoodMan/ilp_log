<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Estoque</title>
    <style>
        /* Estilos do corpo da página e botão de voltar */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: white;
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

        /* Estilos da div com rolagem */
        .scroll-container {
            width: 50%;
            float: left;
            margin: 20px;
            border: 1px solid #ddd;
            background: #fff;
        }

        .right-frame {
            width: 25%;
            border: 1px solid #ddd;
            background: #f9f9f9;
            padding: 20px;
            height: 900px;
            max-height: 900px;
            float: right;
        }

        /* Estilos do iframe */
        iframe {
            width: 100%;
            height: 100%;
            border: none;
            max-height: 900px;
        }

        /* Estilos da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #f2f2f2;
            padding: 12px;
            text-align: center;
            font-size: 14px;
            background: #CDD6DD;
            width: 5%;
        }

        th {
            background-color: #255ba8;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            width: 10%;
        }

        .vaga {
            position: relative;
            height: 60px;
            width: 60px;
            text-align: center;
            font-size: 14px;
        }

        .vaga span {
            display: block;
            font-size: 12px;
            color: #666;
            margin-top: 6px;
        }

        .scroll-container button {
            background: rgb(37, 91, 168);
            color: white;
            padding: 8px 12px;
            font-size: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-top: 5px;
        }

        .scroll-container button:hover {
            background: rgb(56, 130, 235);
        }

        /* Estilos do modal */
        #modalProdutos {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #modalProdutos .modal-content {
            background-color: white;
            width: 50%;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            position: relative;
        }

        #fecharModal {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="scroll-container">
        <table>
            <tr>
                <th>Vaga</th>
                <th>Quantidade Atual</th>
                <th>Quantidade Máximo</th>
                <th>Quantidade Livre</th>
                <th>Ações</th>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "senai";

            // Conexão com o banco de dados
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Atualiza a quantidade atual
            if (!$conn->query("CALL atualizar_quantidade_atual();")) {
                die("Erro ao atualizar a quantidade: " . $conn->error);
            }

            // Consulta para buscar os dados das vagas
            $sql = "SELECT posicaoVaga, quantidadeAtual, quantidadeMaxima FROM estoque";
            $result = $conn->query($sql);

            // Verifica se a consulta foi bem-sucedida
            if (!$result) {
                die("Erro na consulta: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $vaga = $row['posicaoVaga'];
                    $quantidadeAtual = $row['quantidadeAtual'];
                    $quantidadeMaxima = $row['quantidadeMaxima'];
                    $quantidadeLivre = $quantidadeMaxima - $quantidadeAtual;

                    echo "<tr>";
                    echo "<td>$vaga</td>";
                    echo "<td>$quantidadeAtual </td>";
                    echo "<td>$quantidadeMaxima </td>";
                    echo "<td>$quantidadeLivre </td>";
                    echo "<td><button>Monitorar Vaga</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Nenhum dado encontrado</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
            
    <!-- Modal -->
    <div id="modalProdutos" style="display: none;">
        <div class="modal-content">
            <h2>Produtos na Vaga <span id="vagaTitulo"></span></h2>
            <div id="produtosLista"></div>
            <button id="fecharModal">Fechar</button>
        </div>
    </div>

    <script>
        document.querySelectorAll('.scroll-container button').forEach(button => {
            button.addEventListener('click', function() {
                const vaga = this.parentElement.parentElement.querySelector('td').textContent;
                document.getElementById('vagaTitulo').textContent = vaga;

                // Chamada AJAX para buscar os produtos
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'buscar_produtos.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('produtosLista').innerHTML = xhr.responseText;
                        document.getElementById('modalProdutos').style.display = 'block';
                    }
                };
                xhr.send('vaga=' + vaga);
            });
        });

        // Fechar o modal ao clicar no botão de fechar
        document.getElementById('fecharModal').addEventListener('click', function() {
            document.getElementById('modalProdutos').style.display = 'none';
        });
    </script>
    <div class="right-frame">
        <iframe src="inventario.php" title="Estoque"></iframe>
    </div>
</body>

</html>