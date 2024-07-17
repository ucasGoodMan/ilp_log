<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado do Estoque</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Estado do Estoque</h1>
    <table>
        <tr>
            <th></th>
            <th>Rua A</th>
            <th>Rua B</th>
            <th>Rua C</th>
            <th>Rua D</th>
            <th>Rua E</th>
        </tr>
        <?php
        // Dados fictícios para o estoque, ajuste conforme necessário
        $andar = [9234200, 700, 500, 300, 150];
        for ($i = 0; $i < count($andar); $i++) {
            echo "<tr>";
            echo "<td>Andar " . ($i + 1) . " - Valor: " . $andar[$i] . "kg</td>";
            for ($j = 1; $j <= 5; $j++) {
                echo "<td>";
                echo "Status: <select name='status'>
                        <option value='cheia'>Cheia</option>
                        <option value='quase cheia'>Quase Cheia</option>
                        <option value='vazia' selected>Vazia</option>
                      </select>";
                echo "<button>Salvar</button>";
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
