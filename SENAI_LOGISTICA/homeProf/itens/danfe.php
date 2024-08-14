<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>Detalhes do Pedido</title>
    <style>
        .container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="container" id="content">
        <div class="header">
            <?php
            date_default_timezone_set('America/Sao_Paulo');

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

                echo '<form method="POST">';
                echo '<label for="cod_danfe">Código da DANFE:</label>';
                echo '<input type="text" id="cod_danfe" name="cod_danfe" placeholder="32415" required>';

                echo '<label for="chave_acesso_danfe">Chave de Acesso da DANFE:</label>';
                echo '<input type="text" id="chave_acesso_danfe" name="chave_acesso_danfe" required>';

                echo '<label for="data_emissao">Data de Emissão:</label>';
                echo '<input type="date" id="data_emissao" name="data_emissao" value="'.date('Y-m-d').'" readonly required>';

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
                echo "<p>Erro: Pedido ID não fornecido.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <!-- Botão para baixar o PDF -->
    <button id="downloadPDF">Baixar PDF</button>

    <!-- Scripts para dropdowns e interatividade -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script>
        document.getElementById('downloadPDF').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            var doc = new jsPDF('p', 'pt', 'a4');

            var content = document.getElementById('content');

            html2canvas(content, { scale: 2 }).then(function(canvas) {
                var imgData = canvas.toDataURL('image/png');
                var imgWidth = 210; // Largura da página A4 em mm
                var pageHeight = 297; // Altura da página A4 em mm
                var imgHeight = canvas.height * imgWidth / canvas.width;
                var heightLeft = imgHeight;
                var position = 0;

                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }
                doc.save('danfe.pdf');
            }).catch(function (error) {
                console.error('Erro ao criar o canvas:', error);
            });
        });
    </script>
</body>
</html>
