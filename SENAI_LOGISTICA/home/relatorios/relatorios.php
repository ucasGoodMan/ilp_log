<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Relatório Semanal</title>
    <style>
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
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Relatório Semanal</h1>

    <?php
    include ("../../../fusohorario.php");

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "senai";

    // Conexão ao banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Inicia a captura do conteúdo do relatório
    ob_start();

    // Obtendo a data do início da semana (domingo passado)
    $startOfWeek = date('Y-m-d', strtotime('last sunday'));
    // Obtendo a data do final da semana (sábado)
    $endOfWeek = date('Y-m-d', strtotime('next saturday'));

    echo "<h2>Produtos Avariados e Faltando</h2>";
    // Consulta para produtos avariados e faltando
    $sql = "SELECT id, pedidob, nome_produto, qtd_prod, avariado, faltando, observacoes FROM vistoriacarga WHERE avariado = 1 OR faltando = 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Código do Produto</th><th>Nome do Produto</th><th>Quantidade</th><th>Avariado</th><th>Faltando</th><th>Observações</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["pedidob"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nome_produto"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["qtd_prod"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["avariado"] ? 'Sim' : 'Não') . "</td>";
            echo "<td>" . htmlspecialchars($row["faltando"] ? 'Sim' : 'Não') . "</td>";
            echo "<td>" . htmlspecialchars($row["observacoes"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum produto avariado ou faltando encontrado.";
    }

    echo "<h2>Pedidos Criados Durante a Semana</h2>";
    // Consulta para pedidos criados durante a semana
    $sql = "SELECT pedido, data_entrega, data_pedido, observacoes FROM pedidos WHERE data_pedido BETWEEN '$startOfWeek' AND '$endOfWeek'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Pedido</th><th>Data de Entrega</th><th>Data do Pedido</th><th>Observações</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["pedido"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["data_entrega"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["data_pedido"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["observacoes"]) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhum pedido criado durante a semana.";
    }

    echo "<h2>Dados da Vistoria de Containers</h2>";
    // Consulta para vistoria de containers
    $sql = "SELECT * FROM vistoriaconferenciacontainer";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Placa Caminhão</th><th>Nome Motorista</th><th>Container</th><th>Navio</th><th>Cliente</th><th>Tipo</th><th>Lacre</th><th>Lacre SIF</th><th>Temperatura</th><th>IMO</th><th>Número ONU</th><th>Container Desgastado</th><th>Avarias</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["PlacaCaminhao"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["NomeMotorista"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Container"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Navio"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Cliente"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Tipo"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Lacre"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["LacreSif"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["Temperatura"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["IMO"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["NumeroOnu"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["ContainerDesgastado"] ? 'Sim' : 'Não') . "</td>";
            echo "<td>" . htmlspecialchars($row["AvariaLateralDireita"] || $row["AvariaLateralEsquerda"] || $row["AvariaTeto"] || $row["AvariaFrentre"] ? 'Sim' : 'Não') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Nenhuma vistoria de container encontrada.";
    }

    // Captura o conteúdo do buffer de saída
    $relatorioConteudo = ob_get_contents();
    // Finaliza a captura do buffer
    ob_end_clean();

    // Insere o relatório na tabela 'relatorios_gerados'
    $stmt = $conn->prepare("INSERT INTO relatorios_gerados (data_geracao, tipo_relatorio, conteudo_relatorio) VALUES (NOW(), 'Relatório Semanal', ?)");
    $stmt->bind_param("s", $relatorioConteudo);

    if ($stmt->execute()) {
        echo "<p>Relatório salvo com sucesso!</p>";
    } else {
        echo "<p>Erro ao salvar o relatório: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();

    // Exibe o relatório gerado
    echo $relatorioConteudo;
    ?>
</body>
</html>
