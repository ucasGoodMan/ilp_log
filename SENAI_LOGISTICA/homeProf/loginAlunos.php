<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../homeProf/alunos/turmas.css">
    <title>Document</title>
</head>

<body>
    <?php


        $hostname = "127.0.0.1";
        $user = "root";
        $password = "usbw";
        $database = "senai";

        $conexao = mysqli_connect($host, $user, $password, $database);

        if (!$conexao) {
        echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
        exit;
        }

        // Receber o nome personalizado do cabeçalho
        $cabecalho = filter_input(INPUT_POST, 'turmas');

        // Consulta SQL para buscar os dados
        $tabela = "alunos";
        $colunas = "turma_id, email, senha"; // Selecione as colunas que você precisa
        $consulta = "SELECT $colunas FROM $tabela";

        // Executa a consulta e obtém os resultados
        $resultado = mysqli_query($conexao, $consulta);

        if (!$resultado) {
        echo "Falha na consulta SQL: " . mysqli_error($conexao);
        exit;
        }

        // Verifica se há resultados na consulta
        if (mysqli_num_rows($resultado) > 0) {
        // Exibe os dados em uma tabela HTML
        echo "<table>";
        echo "<tr>";
        // Exibe os nomes das colunas como cabeçalhos da tabela
        foreach (explode(", ", $coluna) as $coluna) {
            echo "<th>" . $coluna . "</th>";
        }
        echo "</tr>";

        // Exibe os dados linha a linha
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            foreach ($linha as $coluna => $valor) {
                echo "<td>" . $valor . "</td>";
            }
            echo "</tr>";
        }

            echo "</table>";
        } else {
            echo "Não há resultados na consulta.";
        }

        // Fecha a conexão com o banco de dados
        mysqli_close($conexao);
    ?>

    <form action="process.php" method="post"
        <div class="forms">
            <input type="submit" value="enviar">
        </div>
    </form>
</body>