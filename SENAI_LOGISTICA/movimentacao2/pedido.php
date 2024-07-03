<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Conexão com o banco de dados
$conn = new mysqli("localhost", "username", "password", "database");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$id = $_GET['id'];

// Consultar detalhes do pedido
$sql = "SELECT * FROM criacaopedidos WHERE id=$id";
$result = $conn->query($sql);
$pedido = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
</head>
<body>
    <h1>Detalhes do Pedido</h1>
    <p>ID: <?php echo $pedido["id"]; ?></p>
    <p>Pedido: <?php echo $pedido["pedido"]; ?></p>

    <form action="atualizar_status.php" method="post">
        <input type="hidden" name="id" value="<?php echo $pedido["id"]; ?>">
        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pendente">Pendente</option>
            <option value="concluida">Concluída</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
