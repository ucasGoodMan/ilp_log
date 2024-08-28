<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$mensagem = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo_cliente = $_POST['tipo_cliente'];
    $cnpj = $_POST['cnpj'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO clientes (tipo_cliente, cnpj, telefone, cep, bairro, rua, cidade, estado) 
            VALUES ('$tipo_cliente', '$cnpj', '$telefone', '$cep', '$bairro', '$rua', '$cidade', '$estado')";

    if ($conn->query($sql) === TRUE) {
        $mensagem = "Novo cliente inserido com sucesso!";
    } else {
        $mensagem = "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de transportadora ou Destinatário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .dropdown {
            margin-top: 20px;
        }
        .dropdown-content {
            display: none;
            margin-top: 10px;
        }
        .dropdown-content.active {
            display: block;
        }
        .mensagem {
            margin-top: 20px;
            color: #007BFF;
        }
    </style>
</head>
<body>

<div class="container">
    <form method="POST" action="ciracao.php">
        <div class="form-group">
            <label for="tipo_cliente">Tipo de Cliente:</label>
            <select id="tipo_cliente" name="tipo_cliente">
                <option value="transportadora">transportadora</option>
                <option value="destinatario">Destinatário</option>
            </select>
        </div>

        <div class="dropdown">
            <button type="button" id="toggleForm">Adicionar</button>
            <div id="dropdownContent" class="dropdown-content">
                <div class="form-group">
                    <label for="cnpj">CNPJ:</label>
                    <input type="text" id="cnpj" name="cnpj" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" required>
                </div>
                <div class="form-group">
                    <label for="cep">CEP:</label>
                    <input type="text" id="cep" name="cep" required>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required>
                </div>
                <div class="form-group">
                    <label for="rua">Rua:</label>
                    <input type="text" id="rua" name="rua" required>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade:</label>
                    <input type="text" id="cidade" name="cidade" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <input type="text" id="estado" name="estado" required>
                </div>
                <button type="submit">Salvar Cliente</button>
            </div>
        </div>
    </form>

    <div class="mensagem">
        <?php echo $mensagem; ?>
    </div>
</div>

<script>
    document.getElementById("toggleForm").addEventListener("click", function() {
        var content = document.getElementById("dropdownContent");
        content.classList.toggle("active");
    });
</script>

</body>
</html>