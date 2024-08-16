<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de movimentação</title>
</head>
<body>
    
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pedido_id = $_POST['pedido_id'];
    $numero_doca = $_POST['numero_doca'];
    $nomes_produtos = $_POST['nome_produto'];

    foreach ($nomes_produtos as $nome_produto) {
        $sql_insert = "INSERT INTO doca_pedidos (pedido_id, nome_produto, numero_doca) VALUES ('$pedido_id', '$nome_produto', '$numero_doca')";

        if ($conn->query($sql_insert) !== TRUE) {
            echo "Erro: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    echo "Solicitação de movimentação feita com sucesso!";
}

// Fecha a conexão
$conn->close();
?>
</body>
</html>