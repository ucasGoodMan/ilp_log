<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Estado do Estoque</title>
<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
        padding: 8px;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        padding: 12px 16px;
        z-index: 1;
    }
    .dropdown:hover .dropdown-content {
        display: block;
    }
</style>
</head>
<body>

<h1>Estado do Estoque</h1>

<table id="estoque">
<tr>
    <th></th>
    <?php
// Valores pré-definidos para cada andar
$valoresAndares = [
    1 => 900,
    2 => 700,
    3 => 500,
    4 => 300,
    5 => 150,
];


foreach (range('A', 'E') as $letra) {
    echo "<th>Rua $letra</th>";
}
echo "</tr>";

// Exibir vagas de A1 a E5 em linhas e colunas
foreach (range(5, 1) as $linha) {
    echo "<tr>";
    echo "<th>Andar $linha";
    
    // Exibir o valor fixo ao lado do número do andar
    if (isset($valoresAndares[$linha])) {
        echo " - Valor: " . $valoresAndares[$linha] . "kg";
    }
    
    echo "</th>";
    
    foreach (range('A', 'E') as $letra) {
        $statusVaga = "$letra$linha";
        $status = isset($statusstatusVagas[$statusVaga]) ? $statusVagas[$statusVaga] : "";
        $carga = isset($cargas[$statusVaga]) ? $cargas[$statusVaga] : "";
        
        //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas     //sem aspas
        echo "<td class='statusVaga' data-statusVaga='$statusVaga'>";
        echo "$statusVaga<br><span>Status: $status</span>";
        echo "<div class='dropdown'>";
        echo "<button class='dropbtn'>Alterar Status</button>";
        echo "<div class='dropdown-content'>";
        echo "<a href='atualizar_status.php?statusVaga=$statusVaga&status=Cheia'>Cheia</a><br>";
        echo "<a href='atualizar_status.php?statusVaga=$statusVaga&status=Quase Cheia'>Quase Cheia</a><br>";
        echo "<a href='atualizar_status.php?statusVaga=$statusVaga&status=Vazia'>Vazia</a>";
        echo "</div>";
        echo "</div>";
        echo "<form action='atualizar_status.php' method='POST'>";
        echo "<input type='hidden' name='statusVaga' value='$statusVaga'>";
        echo "<input type='number' name='carga' value='$carga' placeholder='Carga'>";
        echo "<button type='submit'>Salvar</button>";
        echo "</form>";
        echo "</td>";
    }
    echo "</tr>";
}
?>

</table>

</body>
</html>
