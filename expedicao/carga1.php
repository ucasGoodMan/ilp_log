<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "usbw";
$database = "senai";
    
$conexao = new mysqli($hostname, $user, $password, $database);

if (!$conexao) {
    echo "Erro ao conectar ao banco de dados: " . mysqli_connect_error();
    exit;
}
$sql = "SELECT * FROM criacaopedido";
$resultado = mysqli_query($conexao, $sql);

if (!$resultado) {
    echo "Erro ao executar consulta: " . mysqli_error($conexao);
    exit;
}

echo "<table>";
echo "<tr><th>produtos</th><th><th>unidade</th><th><th>quantidade</th><th><th>doca</th>";

while ($linha = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $linha['produtos'] . "</td>";
    echo "<td><td>" . $linha['unidade'] . "</td>";
    echo "<td><td>" . $linha['quantidade'] . "</td>";
    echo "<td><td>" . $linha['doca'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conexao);









?>