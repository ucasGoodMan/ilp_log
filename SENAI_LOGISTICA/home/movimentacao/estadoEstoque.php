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
// Exibir letras (A, B, C, D, E) como cabeçalho da coluna
foreach (range('A', 'E') as $letra) {
    echo "<th>$letra</th>";
}
?>
</tr>
<?php

$hostname = "127.0.0.1";
	$user = "root";
	$password = "root"; 
	$database = "senai";
		
	$conexao = new mysqli($hostname, $user, $password, $database);

	if ($conexao -> connect_errno) {
		echo "Failed to connect to MySQL: " . $conexao -> connect_error;
		exit();
	} else {
		
		$sql = "SELECT `status` FROM `estoque`";

        $status = $conexao -> real_escape_string($_POST['status']);

		   $resultado = $conexao->query($sql);
			   
		   $conexao -> close();
		   header('Location: ', true, 301);
		   }

// Exibir vagas de A1 a E5 em linhas e colunas
foreach (range(1, 5) as $linha) {
    echo "<tr>";
    // Exibir números (1, 2, 3, 4, 5) como cabeçalho da linha
    echo "<th>$linha</th>";
    foreach (range('A', 'E') as $letra) {
        $vaga = "$letra$linha";
        $status = isset($statusVagas[$vaga]) ? $statusVagas[$vaga] : "";
        echo "<td class='vaga' data-vaga='$vaga'>$vaga<br><span>$status</span>";
        echo "<div class='dropdown'>";
        echo "<button class='dropbtn'>$status</button>";
        echo "<div class='dropdown-content'>";
        echo "<a href='atualizar_status.php?vaga=$vaga&status=Cheia'>Cheia</a><br>";
        echo "<a href='atualizar_status.php?vaga=$vaga&status=Quase Cheia'>Quase Cheia</a><br>";
        echo "<a href='atualizar_status.php?vaga=$vaga&status=Vazia'>Vazia</a>";
        echo "</div>";
        echo "</div>";
    }
    echo "</tr>";
}
?>
</table>

</body>
</html>
