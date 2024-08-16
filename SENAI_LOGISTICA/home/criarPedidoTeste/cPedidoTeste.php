<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Adicionar Pedido</h1>
        <?php
        // Conexão ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "senai";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $message = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $npedido = $_POST['npedido'];
            $doca = $_POST['doca'];
            $produtos = $_POST['produtos'];
            $unidade = $_POST['unidade'];
            $quantidade = $_POST['quantidade'];

            $sql = "INSERT INTO criacaopedido (npedido, doca, produtos, unidade, quantidade) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssd", $npedido, $doca, $produtos, $unidade, $quantidade);

            if ($stmt->execute()) {
                $message = "<p class='success'>Pedido adicionado com sucesso!</p>";
            } else {
                $message = "<p class='error'>Erro ao adicionar pedido: " . $stmt->error . "</p>";
            }

            $stmt->close();
        }

        $conn->close();
        ?>

        <form method="POST" action="">
            <label for="npedido">Número do Pedido:</label>
            <input type="text" id="npedido" name="npedido" required>

            <label for="doca">Doca:</label>
            <input type="text" id="doca" name="doca" required>

            <label for="produtos">Produto:</label>
            <input type="text" id="produtos" name="produtos" required>

            <label for="unidade">Unidade:</label>
            <input type="text" id="unidade" name="unidade" required>

            <label for="quantidade">Quantidade:</label>
            <input type="number" step="0.01" id="quantidade" name="quantidade" required>

            <input type="submit" value="Adicionar Pedido">
        </form>

        <div class="message">
            <?php echo $message; ?>
        </div>
    </div>

</body>

</html>
