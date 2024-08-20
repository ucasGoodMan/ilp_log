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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #2d72b7;
        }

        .back-button i {
            margin-right: 5px;
        }

        /* Estilos do container principal */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        .scroll-container::-webkit-scrollbar,
        .right-frame::-webkit-scrollbar {
            width: 10px;
        }

        .scroll-container::-webkit-scrollbar-track,
        .right-frame::-webkit-scrollbar-track {
            background: #f2f2f2;
            border-radius: 6px;
        }

        .scroll-container::-webkit-scrollbar-thumb,
        .right-frame::-webkit-scrollbar-thumb {
            background-color: rgb(37, 91, 168);
            border-radius: 6px;
            border: 2px solid #f2f2f2;
        }

        .scroll-container::-webkit-scrollbar-thumb:hover,
        .right-frame::-webkit-scrollbar-thumb:hover {
            background-color: #2d72b7;
        }


        .content {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        /* Estilos da div com rolagem */
        .scroll-container {
            width: 100%;
            max-width: 700px;
            margin-bottom: 20px;
            border-radius: 12px;
            background: #fff;
            padding: 20px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            overflow-y: auto;
            max-height: 60vh;
        }

        /* Estilos da tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
            border-bottom: 1px solid #f2f2f2;
        }

        th {
            background-color: rgb(37, 91, 168);
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
        }

        td {
            background-color: #f9f9f9;
        }

        .scroll-container button {
            background: rgb(37, 91, 168);
            color: white;
            padding: 8px 12px;
            font-size: 12px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            transition: background-color 0.3s;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .scroll-container button:hover {
            background: rgb(56, 130, 235);
        }

        /* Estilos do iframe */
        .right-frame {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            height: 571px;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
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
            justify-content: center;
            align-items: center;
            z-index: 1000;
            backdrop-filter: blur(5px);
        }

        #modalProdutos .modal-content {
            background-color: white;
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            position: relative;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        #modalProdutos .modal-content h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: rgb(37, 91, 168);
            text-align: center;
            font-weight: bold;
            border-bottom: 2px solid #f2f2f2;
            padding-bottom: 10px;
        }

        #modalProdutos .modal-content #produtosLista {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
            border-radius: 8px;
            background-color: #f9f9f9;
            box-shadow: inset 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        #fecharModal {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5%;
            cursor: pointer;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s;
        }

        #fecharModal:hover {
            background-color: rgb(56, 130, 235);
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="content">
            <div class="scroll-container">
                <table>
                    <tr>
                        <th>Vaga</th>
                        <th>Quantidade Atual</th>
                        <th>Quantidade Máxima</th>
                        <th>Quantidade Livre</th>
                        <th>Ações</th>
                    </tr>
                    <?php
                    include "../../sidebarALU.php";
                    $servername = "localhost";
                    $username = "root";
                    $password = "root";
                    $dbname = "senai";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Falha na conexão: " . $conn->connect_error);
                    }

                    if (!$conn->query("CALL atualizar_quantidade_atual();")) {
                        die("Erro ao atualizar a quantidade: " . $conn->error);
                    }

                    $sql = "SELECT posicaoVaga, quantidadeAtual, quantidadeMaxima FROM estoque";
                    $result = $conn->query($sql);

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
                            echo "<td>$quantidadeAtual</td>";
                            echo "<td>$quantidadeMaxima</td>";
                            echo "<td>$quantidadeLivre</td>";
                            echo "<td><button>Monitorar Vaga</button></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum dado encontrado</td></tr>";
                    }

                    $conn->close();
                    ?>
                </table>
            </div>

            <div class="right-frame">
                <iframe src="inventario.php" title="Estoque"></iframe>
            </div>
        </div>
    </div>

    <div id="modalProdutos">
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

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'buscar_produtos.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        document.getElementById('produtosLista').innerHTML = xhr.responseText;
                        document.getElementById('modalProdutos').style.display = 'flex';
                    }
                };
                xhr.send('vaga=' + vaga);
            });
        });

        document.getElementById('fecharModal').addEventListener('click', function() {
            document.getElementById('modalProdutos').style.display = 'none';
        });
    </script>
</body>

</html>