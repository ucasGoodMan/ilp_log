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
            width: 50%; /* Ajuste a largura conforme necessário */
            float: left; /* Posiciona a div à esquerda */
            margin: 20px; /* Ajuste as margens conforme necessário */
            border: 1px solid #ddd;
            background: #fff;
        }

        .right-frame {
            width: 25%; /* Ajuste a largura conforme necessário */
            border: 1px solid #ddd;
            background: #f9f9f9;
            padding: 20px;
            height: 900px; /* Ajuste a altura conforme necessário */
            max-height: 900px;
            float: right;
            overflow: auto;
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
    </style>
</head>

<body>

    <!-- Container para a div com rolagem -->
    <div class="scroll-container">
        <table>
            <tr>
                <th></th>
                <?php
                foreach (range('A', 'E') as $letra) {
                    echo "<th>Rua $letra</th>";
                }
                ?>
            </tr>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "senai";
            // Conexão com o banco de dados
            $conn = new mysqli("localhost", "root", "root", "senai");

            // Verifica a conexão
            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            // Consulta para buscar os dados das vagas
            $sql = "SELECT posicaoVaga, statusVaga, quantidadeAtual, quantidadeMaxima FROM estoque";
            $result = $conn->query($sql);

            $statusVagas = [];
            $quantidadesAtuais = [];
            $quantidadesMaximas = [];

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $statusVagas[$row['posicaoVaga']] = $row['statusVaga'];
                    $quantidadesAtuais[$row['posicaoVaga']] = $row['quantidadeAtual'];
                    $quantidadesMaximas[$row['posicaoVaga']] = $row['quantidadeMaxima'];
                }
            }

            // Quantidades correspondentes para os andares
            $quantidades = [
                1 => '50 itens',
                2 => '100 itens',
                3 => '150 itens',
                4 => '200 itens',
                5 => '250 itens'
            ];

            // Exibir vagas de A1 a E5 em linhas e colunas
            foreach (range(5, 1) as $linha) {
                echo "<tr>";
                // Exibir números (1, 2, 3, 4, 5) como cabeçalho da linha com quantidade correspondente
                echo "<th>Andar $linha<br><span>Quantidade: {$quantidades[$linha]}</span></th>";

                foreach (range('A', 'E') as $letra) {
                    $vaga = "$letra$linha";
                    $status = isset($statusVagas[$vaga]) ? $statusVagas[$vaga] : "Vazia";
                    $quantidadeAtual = isset($quantidadesAtuais[$vaga]) ? $quantidadesAtuais[$vaga] : 0;
                    $quantidadeMaxima = isset($quantidadesMaximas[$vaga]) ? $quantidadesMaximas[$vaga] : 0;

                    echo "<td class='vaga' data-vaga='$vaga'>$vaga<br><span>Status: $status</span><br><span>Quantidade Atual: {$quantidadeAtual} itens / {$quantidadeMaxima} itens</span>";
                    echo "<button>Monitorar Vaga</button>";
                    echo "</td>";
                }
                echo "</tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>

    <!-- Div com iframe -->
    <div class="right-frame">
        <iframe src="inventario.php" title="Estoque"></iframe>
    </div>
</body>

</html>