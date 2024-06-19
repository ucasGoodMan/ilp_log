<?php
// Conexão ao banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Dados recebidos via POST
$statusVaga = $_POST['statusVaga'];
$pesoProd = $_POST['pesoProd'];

// Ajusta a carga padrão para os andares 1
if (strpos($statusVaga, '1') !== false) {
    $pesoProd = 900;
}
// Ajusta a carga padrão para os andares 2
if (strpos($statusVaga, '2') !== false) {
    $pesoProd = 700;
}
// Ajusta a carga padrão para os andares 3
if (strpos($statusVaga, '3') !== false) {
    $pesoProd = 500;
}
// Ajusta a carga padrão para os andares 4
if (strpos($statusVaga, '4') !== false) {
    $pesoProd = 300;
}
// Ajusta a carga padrão para os andares 5
if (strpos($statusVaga, '5') !== false) {
    $pesoProd = 150;
}

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Atualiza a carga da vaga no banco de dados
$updateSql = "UPDATE movimentacaoestoque SET pesoProd = '$pesoProd' WHERE statusVaga = '$statusVaga'";
if ($conn->query($updateSql) === TRUE) {
    echo "Carga da vaga $statusVaga atualizada para $pesoProd.";
} else {
    echo "Erro ao atualizar a carga da vaga: " . $conn->error;
}

// Fecha a conexão
$conn->close();

// Redireciona de volta para a interface principal
header("Location: estadoEstoque.php");
exit();
?>
