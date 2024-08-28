<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

                if ($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_POST['add_new'])) {
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

                echo '<form method="POST">';
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
                        echo "<p>Nenhum produto encontrado para este pedido.</p>";
                    }
                } else {
                    echo "<p>Erro na execução da consulta: " . $conn->error . "</p>";
                }
            } else {
                echo "<p>ID do pedido não fornecido.</p>";
            }

            $conn->close();
            ?>

            <script>
                function openModal(modalId) {
                    document.getElementById(modalId).style.display = "block";
                }

                function closeModal(modalId) {
                    document.getElementById(modalId).style.display = "none";
                }
                document.querySelectorAll('select').forEach(function(select) {
                    select.addEventListener('change', function() {
                        if (this.value === 'add') {
                            openModal('modal_' + this.id);
                        }
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