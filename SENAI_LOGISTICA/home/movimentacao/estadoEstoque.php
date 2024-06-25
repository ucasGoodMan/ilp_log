<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        .vaga {
            margin-left: 10px;
        }
    </style>
</head>
<body>
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
<<<<<<< HEAD
    // Pesos correspondentes para os andares
    $pesos = [
        1 => '900kg',
        2 => '500kg',
        3 => '350kg',
        4 => '200kg',
        5 => '150kg'
    ];
=======
//relacionado com estoque
$valoresAndares = [
    1 => 900,
    2 => 700,
    3 => 500,
    4 => 300,
    5 => 150,
];
>>>>>>> 8cb1743b7970a59f3268afc0f3ce1ed0e129548d

    // Exibir vagas de A1 a E5 em linhas e colunas
    foreach (range(5, 1) as $linha) {
        echo "<tr>";
        // Exibir números (1, 2, 3, 4, 5) como cabeçalho da linha com peso correspondente
        echo "<th>Andar $linha<br><span>Peso: {$pesos[$linha]}</span></th>";
        
        foreach (range('A', 'E') as $letra) {
            $vaga = "$letra$linha";
            $status = isset($statusVagas[$vaga]) ? $statusVagas[$vaga] : "";
            echo "<td class='vaga' data-vaga='$vaga'>$vaga<br><span>Status: $status</span>";
            echo "<div class='dropdown'>";
            echo "<button class='dropbtn'>Alterar Status</button>";
            echo "<div class='dropdown-content'>";
            echo "<a href='atualizar_status.php?vaga=$vaga&status=Cheia'>Cheia</a><br>";
            echo "<a href='atualizar_status.php?vaga=$vaga&status=Quase Cheia'>Quase Cheia</a><br>";
            echo "<a href='atualizar_status.php?vaga=$vaga&status=Vazia'>Vazia</a>";
            echo "</div>";
            echo "</div>";
            echo "</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
