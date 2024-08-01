<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "root"; // Adicione a senha do banco de dados, se necessário
$dbname = "senai";

// Variáveis para armazenar o resultado da consulta
$resultado = "";
$erro = "";
$dadosPedido = [];

// Verifica se o formulário de consulta foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedido_id']) && !isset($_POST['salvar'])) {
    // Obtém o número do pedido do formulário
    $pedido_id = $_POST['pedido_id'];

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta ao banco de dados
    $sql = "SELECT * FROM produtos WHERE pedido_id = ?";
    $stmt = $conn->prepare($sql);

<<<<<<< HEAD
    if ($stmt) {
        $stmt->bind_param("s", $pedido_id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Exibindo as informações do pedido
            $resultado .= "<h2>Informações do Pedido</h2>";
            while ($row = $result->fetch_assoc()) {
                $resultado .= "Número do Pedido: " . htmlspecialchars($row['pedido_id']) . "<br>";
                $resultado .= "Nome do Produto: " . htmlspecialchars($row['nome_produto']) . "<br>";
                $resultado .= "Quantidade: " . htmlspecialchars($row['qtd_prod']) . "<br>";

                // Adiciona os dados para o formulário de inserção na nova tabela
                $dadosPedido = [
                    'pedido_id' => htmlspecialchars($row['pedido_id']),
                    'nome_produto' => htmlspecialchars($row['nome_produto']),
                    'qtd_prod' => htmlspecialchars($row['qtd_prod']),
                ];
            }
        } else {
            $erro = "Nenhum pedido encontrado com esse número.";
=======
    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Exibindo as informações do pedido
        $resultado .= "<h2>Informações do Pedido</h2>";
        while ($row = $result->fetch_assoc()) {
            $resultado .= "Número do Pedido: " . htmlspecialchars($row['pedido_id']) . "<br>";
            $resultado .= "nome_prod: " . htmlspecialchars($row['nome_prod']) . "<br>";
            $resultado .= "qtd_prod: " . htmlspecialchars($row['qtd_prod']) . "<br>";
            $resultado .= "Valor por Unidade: " . htmlspecialchars($row['rsunit_prod']) . "<br>";
            $resultado .= "Doca: " . htmlspecialchars($row['doca']) . "<br><br>";

            // Adiciona os dados para o formulário de inserção na nova tabela
            $dadosPedido = [
                'pedido_id' => htmlspecialchars($row['pedido_id']),
                'nome_prod' => htmlspecialchars($row['nome_prod']),
                'qtd_prod' => htmlspecialchars($row['qtd_prod']),
                'rsunit_prod' => htmlspecialchars($row['rsunit_prod']),
                'doca' => htmlspecialchars($row['doca']),
            ];
>>>>>>> parent of 89f4741 (s)
        }

        // Fechando a conexão
        $stmt->close();
    } else {
        $erro = "Erro na preparação da consulta: " . $conn->error;
    }
    
    $conn->close();
}

// Verifica se o formulário de salvamento foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
    // Obtém os dados do formulário
    $pedido_id = $_POST['pedido_id'];
    $nome_prod = $_POST['nome_prod'];
    $qtd_prod = $_POST['qtd_prod'];
<<<<<<< HEAD
    $avariado = isset($_POST['avariado']) ? 1 : 0;
    $faltando = isset($_POST['faltando']) ? 1 : 0;
    $observacoes = $_POST['comentarios'];
=======
    $rsunit_prod = $_POST['rsunit_prod'];
    $doca = $_POST['doca'];
    $checkAvaria = isset($_POST['checkAvaria']) ? 1 : 0;
    $checkFalta = isset($_POST['checkFalta']) ? 1 : 0;
    $comentarios = $_POST['comentarios'];
>>>>>>> parent of 89f4741 (s)

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Inserção na nova tabela
<<<<<<< HEAD
    $sql = "INSERT INTO vistoriacarga (pedido_id, nome_produto, qtd_prod, avariado, faltando, observacoes) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
=======
    $sql = "INSERT INTO vistoriacarga (pedido_id, nome_prod, qtd_prod, rsunit_prod, doca, avariado, faltando, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisiiis", $pedido_id, $nome_prod, $qtd_prod, $rsunit_prod, $doca, $checkAvaria, $checkFalta, $comentarios);
>>>>>>> parent of 89f4741 (s)

    if ($stmt) {
        $stmt->bind_param("ssisii", $pedido_id, $nome_produto, $qtd_prod, $avariado, $faltando, $observacoes);

        if ($stmt->execute()) {
            $resultado = "Dados salvos com sucesso!";
        } else {
            $erro = "Erro ao salvar os dados: " . $stmt->error;
        }

        // Fechando a conexão
        $stmt->close();
    } else {
        $erro = "Erro na preparação da consulta: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Consulta de Pedido</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: rgb(37, 91, 140);
        }

        .back-button i {
            margin-right: 5px;
        }

        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"] {
            width: 97%; /* Define uma largura específica */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            width: 100%;
            border: none;
            border-radius: 4px;
            background-color:  rgb(37, 91, 168);
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: rgb(37, 91, 140);
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        .result {
            margin-top: 20px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
<a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
<div class="container">
    <!-- Formulário de consulta -->
    <form action="vistoriaCarga.php" method="post">
        <label for="pedido_id">Número do Pedido:</label>
        <input type="text" id="pedido_id" name="pedido_id" required>
        <input type="submit" value="Consultar">
    </form>

    <div class="result">
    <?php
    // Exibe o resultado ou a mensagem de erro
    if ($resultado) {
        echo $resultado;

        // Exibe o formulário de salvamento apenas se houver resultados
        if (!empty($dadosPedido)) {
    ?>
        <h2>Salvar Informações Adicionais</h2>
        <form action="vistoriaCarga.php" method="post">
            <input type="hidden" name="pedido_id" value="<?php echo $dadosPedido['pedido_id']; ?>">
            <input type="hidden" name="nome_prod" value="<?php echo $dadosPedido['nome_prod']; ?>">
            <input type="hidden" name="qtd_prod" value="<?php echo $dadosPedido['qtd_prod']; ?>">
<<<<<<< HEAD
=======
            <input type="hidden" name="rsunit_prod" value="<?php echo $dadosPedido['rsunit_prod']; ?>">
            <input type="hidden" name="doca" value="<?php echo $dadosPedido['doca']; ?>">
>>>>>>> parent of 89f4741 (s)

            <label for="avariado">Avariado?</label>
            <input type="checkbox" id="avariado" name="avariado" value="1"><br>

            <label for="faltando">Faltando?</label>
            <input type="checkbox" id="faltando" name="faltando" value="1"><br>
            
            <label for="comentarios">Observações:</label>
            <input type="text" id="comentarios" name="comentarios"><br>

            <input type="hidden" name="salvar" value="1">
            <input type="submit" value="Salvar">
        </form>
    <?php
        }
    } elseif ($erro) {
        echo '<p class="error">' . $erro . '</p>';
    }
    ?>
    </div>
</div>

</body>
</html>
