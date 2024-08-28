<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="danfe.js">

    <title>Detalhes do Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
            padding: 20px;
            margin: 20px;
        }

        .header p {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-top: 10px;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        form input[type="text"],
        form input[type="date"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            background: #255ba8;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        form input[type="submit"]:hover {
            background-color: #1a4380;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fafafa;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        td {
            padding-left: 20px;
            padding-right: 20px;
        }

        .info-section {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: none;
            background-color: #fafafa;
            transition: all 0.3s ease;
        }

        .info-section h2 {
            margin-top: 0;
            font-size: 18px;
            color: #4CAF50;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-top: 20px;
            width: 100%;
        }

        .dropdown-button {
            background: #255ba8;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: left;
            width: 100%;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        .dropdown-button:hover {
            background: #1a4380;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100%;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            padding: 10px;
            border-radius: 5px;
        }

        .dropdown-content div {
            cursor: pointer;
            padding: 10px;
            transition: background-color 0.3s ease;
        }

        .dropdown-content div:hover {
            background-color: #ddd;
        }

        #downloadPDF {
            background-color: #255ba8;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
            box-sizing: border-box;
            text-align: center;
        }

        #downloadPDF:hover {
            background-color: #1a4380;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

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
    </style>
</head>

<body>
    <div class="container" id="content">
        <div class="header">            
            <?php
            date_default_timezone_set('America/Sao_Paulo');
            include "../../sidebarPROF.php";
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "senai";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            if (isset($_GET['pedido_id'])) {
                $pedido_id = $conn->real_escape_string($_GET['pedido_id']);
                echo "<p>Pedido Número: " . htmlspecialchars($pedido_id) . "</p>";

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $cod_danfe = $conn->real_escape_string($_POST['cod_danfe']);
                    $chave_acesso_danfe = $conn->real_escape_string($_POST['chave_acesso_danfe']);
                    $data_emissao = date('Y-m-d'); // Data atual para emissão

                    $sql_insert = "INSERT INTO detalhes_danfe 
        (pedido_id, cod_danfe, chave_acesso_danfe, data_emissao) 
        VALUES ('$pedido_id', '$cod_danfe', '$chave_acesso_danfe', '$data_emissao')";

                    if ($conn->query($sql_insert) === TRUE) {
                        echo "<p>Danfe cadastrada com sucesso!</p>";
                    } else {
                        echo "<p>Erro ao inserir dados: " . $conn->error . "</p>";
                    }
                }

                echo '<form method="POST" id="danfeForm">';
                echo '<label for="cod_danfe">Código da DANFE:</label>';
                echo '<input type="text" id="cod_danfe" name="cod_danfe" required>';

                echo '<label for="chave_acesso_danfe">Chave de Acesso da DANFE:</label>';
                echo '<input type="text" id="chave_acesso_danfe" name="chave_acesso_danfe" required>';

                echo '<label for="data_emissao">Data de Emissão:</label>';
                echo '<input type="date" id="data_emissao" name="data_emissao" value="' . date('Y-m-d') . '" readonly required>';

            

                echo '<input type="submit" value="Salvar">';
                echo '</form>';

                $sql_produtos = "SELECT cod_prod, nome_produto, un_prod, qtd_prod, rsunit_prod, cst_prod, ncm_prod, cfop_prod FROM produtos WHERE pedidob = '$pedido_id'";
                $result_produtos = $conn->query($sql_produtos);

                if ($result_produtos) {
                    if ($result_produtos->num_rows > 0) {
                        echo "<table>";
                        echo "<tr><th>Código</th><th>Nome</th><th>Unidade</th><th>Quantidade</th><th>Preço Unitário</th><th>CST</th><th>NCM</th><th>CFOP</th></tr>";
                        while ($row_produtos = $result_produtos->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row_produtos["cod_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["nome_produto"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["un_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["qtd_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["rsunit_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["cst_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["ncm_prod"]) . "</td>";
                            echo "<td>" . htmlspecialchars($row_produtos["cfop_prod"]) . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "<p>Não há produtos para este pedido.</p>";
                    }
                } else {
                    echo "<p>Erro ao buscar produtos: " . $conn->error . "</p>";
                }

                $conn->close();
            }
            ?>

            <!-- Botão para Transportadora -->
            <div class="dropdown">
                <button class="dropdown-button" id="showTransportadoras">Mostrar Transportadoras</button>
                <div class="dropdown-content" id="transportadoraDropdown"></div>
            </div>

            <!-- Botão para Destinatário -->
            <div class="dropdown">
                <button class="dropdown-button" id="showDestinatarios">Mostrar Destinatários</button>
                <div class="dropdown-content" id="destinatarioDropdown"></div>
            </div>

            <!-- Informações sobre Transportadora e Destinatário -->
            <div id="infoTransportadora" class="info-section"></div>
            <div id="infoDestinatario" class="info-section"></div>
        </div>
    </div>

    <div id="modal_destinatario" class="modal-content" style="display:none;">
        <span class="close" onclick="closeModal('modal_destinatario')">&times;</span>
        <!-- Conteúdo do modal para adicionar novo destinatário -->
        <form method="POST"     ="adicionar_destinatario.php">
            <label for="nome_destinatario">Nome do Destinatário:</label>
            <input type="text" id="nome_destinatario" name="nome_destinatario" required>
            <input type="submit" value="Adicionar Destinatário">
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Função para carregar opções no dropdown
            function loadOptions(url, dropdownId, infoId, idField) {
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        const dropdown = document.getElementById(dropdownId);
                        dropdown.innerHTML = '';
                        data.forEach(item => {
                            const div = document.createElement('div');
                            div.textContent = item.nome;
                            div.dataset.id = item.id; // Armazena o ID
                            div.dataset.cnpj = item.cnpj;
                            div.dataset.telefone = item.telefone;
                            div.dataset.cep = item.cep;
                            div.dataset.bairro = item.bairro;
                            div.dataset.rua = item.rua;
                            div.dataset.cidade = item.cidade;
                            div.dataset.estado = item.estado;
                            div.addEventListener('click', function() {
                                document.getElementById(infoId).innerHTML = `
                            <strong>Nome:</strong> ${this.textContent}<br>
                            <strong>CNPJ:</strong> ${this.dataset.cnpj}<br>
                            <strong>Telefone:</strong> ${this.dataset.telefone}<br>
                            <strong>CEP:</strong> ${this.dataset.cep}<br>
                            <strong>Bairro:</strong> ${this.dataset.bairro}<br>
                            <strong>Rua:</strong> ${this.dataset.rua}<br>
                            <strong>Cidade:</strong> ${this.dataset.cidade}<br>
                            <strong>Estado:</strong> ${this.dataset.estado}<br>
                        `;
                                document.getElementById(infoId).style.display = 'block';

                                // Atualiza o campo oculto com o ID selecionado
                                document.getElementById(idField).value = this.dataset.id;
                            });
                            dropdown.appendChild(div);
                        });
                    })
                    .catch(error => console.error('Erro ao carregar opções:', error));
            }

            // Função para fechar todos os dropdowns
            function closeDropdowns() {
                document.querySelectorAll('.dropdown-content').forEach(dropdown => {
                    dropdown.style.display = 'none';
                });
            }

            // Função para mostrar o dropdown e fechar outros dropdowns
            function showDropdown(dropdownId) {
                closeDropdowns();
                const dropdown = document.getElementById(dropdownId);
                dropdown.style.display = 'block';
            }

            // Event listeners para os botões de dropdown
            document.getElementById('showTransportadoras').addEventListener('click', function(event) {
                event.stopPropagation(); // Evita que o clique no botão feche o dropdown
                loadOptions('get_transportadoras.php', 'transportadoraDropdown', 'infoTransportadora', 'transportadora_id');
                showDropdown('transportadoraDropdown');
            });

            document.getElementById('showDestinatarios').addEventListener('click', function(event) {
                event.stopPropagation(); // Evita que o clique no botão feche o dropdown
                loadOptions('get_destinatarios.php', 'destinatarioDropdown', 'infoDestinatario', 'destinatario_id');
                showDropdown('destinatarioDropdown');
            });

            // Fecha os dropdowns ao clicar fora deles
            document.addEventListener('click', function() {
                closeDropdowns();
            });
        });
    </script>
    </div>
    </div>
    <div class="right-frame">
        <iframe src="ciracao.php" title="Estoque"></iframe>
    </div>
</body>

</html>