<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro de conexão: ". $conn->connect_error);
}

// Consulta para recuperar os pedidos
$sql = "SELECT npedido, doca FROM criacaopedido";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Definir a doca
    $docas = array(1, 2, 3, 4, 5, 6, 7, 8); // você pode definir as docas aqui

    // Exibir os pedidos na tabela HTML
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Pedido de Nº</th>";
    echo "<th>Doca</th>";
    echo "<th></th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    $i = 0;
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>". $row["npedido"]. "</td>";
        echo "<td>". $row["doca"]. "</td>"; // substitua com o valor da doca que você deseja atribuir
        echo "<td><button class='button'>Abrir</button></td>";
        echo "</tr>";
        $i++;
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Nenhum pedido encontrado.";
}

$conn->close();
?>