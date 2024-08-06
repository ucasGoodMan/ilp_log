<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['pedido_id'])) {
    $pedido_id = $_POST['pedido_id'];

    // Deleta os produtos relacionados ao pedido
    $sql_delete_produtos = "DELETE FROM produtos WHERE pedidob = '$pedido_id'";
    $conn->query($sql_delete_produtos);

    // Deleta o pedido
    $sql_delete_pedido = "DELETE FROM pedidos WHERE pedido = '$pedido_id'";
    if ($conn->query($sql_delete_pedido) === TRUE) {
        echo "Pedido deletado com sucesso.";
    } else {
        echo "Erro ao deletar o pedido: " . $conn->error;
    }
} else {
    echo "ID do pedido não fornecido.";
}

$conn->close();
header('Location: meuspedidos.php', true, 301);
?>