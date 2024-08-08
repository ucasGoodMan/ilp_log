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
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fafafa;
        }

        th, td {
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
            background: #255ba8;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <?php
            // Define o fuso horário
            date_default_timezone_set('America/Sao_Paulo');

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
                $pedido_id = $conn->real_escape_string($_GET['pedido_id']);
                echo "<p>Pedido Número: " . htmlspecialchars($pedido_id) . "</p>";

                // Verifica se o formulário foi submetido
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $cod_danfe = $conn->real_escape_string($_POST['cod_danfe']);
                    $chave_acesso_danfe = $conn->real_escape_string($_POST['chave_acesso_danfe']);
                    $data_emissao = date('Y-m-d');
                    $data_entrega = $conn->real_escape_string($_POST['data_entrega']);
                    $cst_prod = (int)$_POST['cst_prod'];
                    $ncm_prod = $conn->real_escape_string($_POST['ncm_prod']);
                    $cfop_prod = (int)$_POST['cfop_prod'];

                    // Insere os dados na tabela detalhes_danfe
                    $sql_insert = "INSERT INTO detalhes_danfe (pedido_id, cod_danfe, chave_acesso_danfe, data_emissao, data_entrega, cst_prod, ncm_prod, cfop_prod)
                     VALUES ('$pedido_id', '$cod_danfe', '$chave_acesso_danfe', '$data_emissao', '$data_entrega', $cst_prod, '$ncm_prod', $cfop_prod)";

                    if ($conn->query($sql_insert) === TRUE) {
                        echo "<p>Dados inseridos com sucesso!</p>";
                    } else {
                        echo "<p>Erro ao inserir dados: " . $conn->error . "</p>";
                    }
                }

                // Exibe o formulário
                echo '<form method="POST">';
                echo '<label for="cod_danfe">Código da DANFE:</label>';
                echo '<input type="text" id="cod_danfe" name="cod_danfe" placeholder="32415" required>';

                echo '<label for="chave_acesso_danfe">Chave de Acesso da DANFE:</label>';
                echo '<input type="text" id="chave_acesso_danfe" name="chave_acesso_danfe" placeholder="921183823728374292028..." required>';

                echo '<label for="data_emissao">Data de Emissão:</label>';
                echo '<input type="date" id="data_emissao" name="data_emissao" required>';

                echo '<label for="data_entrega">Data de Entrega:</label>';
                echo '<input type="date" id="data_entrega" name="data_entrega" required>';

                echo '<label for="cst_prod">CST:</label>';
                echo '<input type="number" id="cst_prod" name="cst_prod" placeholder="000" required>';

                echo '<label for="ncm_prod">NCM:</label>';
                echo '<input type="text" id="ncm_prod" name="ncm_prod" placeholder="00000000" required>';

                echo '<label for="cfop_prod">CFOP:</label>';
                echo '<input type="number" id="cfop_prod" name="cfop_prod" placeholder="0000" required>';

                echo '<input type="submit" value="Salvar">';
                echo '</form>';

                // Consulta para buscar os produtos do pedido
                $sql_produtos = "SELECT cod_prod, nome_produto, un_prod, qtd_prod, rsunit_prod, cst_prod, ncm_prod, cfop_prod FROM produtos WHERE pedidob = '$pedido_id'";
                $result_produtos = $conn->query($sql_produtos);

                if ($result_produtos) {
                    if ($result_produtos->num_rows > 0) {
                       
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
                        echo "<p>Nenhum produto encontrado para este pedido.</p>";
                    }
                } else {
                    echo "<p>Erro na execução da consulta: " . $conn->error . "</p>";
                }
            } else {
                echo "<p>Erro: Pedido ID não fornecido.</p>";
            }

            // Fecha a conexão
            $conn->close();
            ?>
        </div>
        
        <!-- Informações do Despachante -->
        <div class="info-section" id="despachante-info">
            <h2>Despachante</h2>
            <p>CNPJ: 03.389.993/0001-23</p>
            <p>Telefone: (47) 3247-9763</p>
            <p>CEP: 88.304-101</p>
            <p>Bairro: São João</p>
            <p>Rua: Heitor Liberato</p>
            <p>Cidade: Itajaí</p>
            <p>Estado: SC</p>
        </div>
        
        <!-- Dropdown Transportadoras -->
        <div class="dropdown">
            <button class="dropdown-button" onclick="toggleDropdown('dropdown-content-transportadoras')">Transportadoras</button>
            <div class="dropdown-content" id="dropdown-content-transportadoras">
                <!-- Conteúdo do dropdown será inserido aqui via JavaScript -->
            </div>
        </div>

        <!-- Informações da Transportadora Selecionada -->
        <div class="info-section" id="transportadora-info">
            <h2>Informações da Transportadora</h2>
            <!-- Informações da transportadora serão exibidas aqui -->
        </div>

        <!-- Dropdown Destinatários -->
        <div class="dropdown">
            <button class="dropdown-button" onclick="toggleDropdown('dropdown-content-destinatarios')">Destinatários</button>
            <div class="dropdown-content" id="dropdown-content-destinatarios">
                <!-- Conteúdo do dropdown será inserido aqui via JavaScript -->
            </div>
        </div>
        
        <!-- Informações do Destinatário Selecionado -->
        <div class="info-section" id="destinatario-info">
            <h2>Informações do Destinatário</h2>
            <!-- Informações do destinatário serão exibidas aqui -->
        </div>
    </div>

    <script>
        // Dados das transportadoras e destinatários
        const transportadoras = [
            {
                nome: "Transportadora A",
                cnpj: "12.345.678/0001-90",
                frota: 10,
                telefone: "(11) 98765-4321",
                cep: "01000-000",
                bairro: "Centro",
                rua: "Rua X, 123",
                cidade: "São Paulo",
                estado: "SP"
            },
            {
                nome: "Transportadora B",
                cnpj: "98.765.432/0001-09",
                frota: 5,
                telefone: "(21) 91234-5678",
                cep: "22000-000",
                bairro: "Copacabana",
                rua: "Avenida Y, 456",
                cidade: "Rio de Janeiro",
                estado: "RJ"
            },
            {
                nome: "Transportadora C",
                cnpj: "23.456.789/0001-01",
                frota: 20,
                telefone: "(31) 93456-7890",
                cep: "30100-000",
                bairro: "Savassi",
                rua: "Rua Z, 789",
                cidade: "Belo Horizonte",
                estado: "MG"
            }
        ];

        const destinatarios = [
            {
                nome: "Destinatário A",
                cpf: "123.456.789-00",
                telefone: "(11) 98765-4321",
                cep: "01000-000",
                bairro: "Centro",
                rua: "Rua Alpha, 123",
                cidade: "São Paulo",
                estado: "SP"
            },
            {
                nome: "Destinatário B",
                cpf: "987.654.321-00",
                telefone: "(21) 91234-5678",
                cep: "22000-000",
                bairro: "Copacabana",
                rua: "Avenida Beta, 456",
                cidade: "Rio de Janeiro",
                estado: "RJ"
            },
            {
                nome: "Destinatário C",
                cpf: "456.789.123-00",
                telefone: "(31) 93456-7890",
                cep: "30100-000",
                bairro: "Savassi",
                rua: "Rua Gama, 789",
                cidade: "Belo Horizonte",
                estado: "MG"
            }
        ];

        function populateDropdowns() {
            const transportadoraDropdown = document.getElementById('dropdown-content-transportadoras');
            const destinatarioDropdown = document.getElementById('dropdown-content-destinatarios');

            transportadoras.forEach((transportadora, index) => {
                const div = document.createElement('div');
                div.innerText = transportadora.nome;
                div.onclick = () => showInfo('transportadora-info', transportadora);
                transportadoraDropdown.appendChild(div);
            });

            destinatarios.forEach((destinatario, index) => {
                const div = document.createElement('div');
                div.innerText = destinatario.nome;
                div.onclick = () => showInfo('destinatario-info', destinatario);
                destinatarioDropdown.appendChild(div);
            });
        }

        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        function showInfo(sectionId, data) {
            const infoSection = document.getElementById(sectionId);
            let html = '';
            for (const key in data) {
                if (data.hasOwnProperty(key)) {
                    html += `<p>${key.charAt(0).toUpperCase() + key.slice(1)}: ${data[key]}</p>`;
                }
            }
            infoSection.innerHTML = `<h2>Informações</h2>${html}`;
            infoSection.style.display = 'block';
        }

        // Inicializa os dropdowns
        window.onload = populateDropdowns;
    </script>
</body>

</html>
