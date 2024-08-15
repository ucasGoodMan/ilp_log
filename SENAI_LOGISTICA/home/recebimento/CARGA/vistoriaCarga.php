<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Variáveis para armazenar o resultado da consulta
$resultado = "";
$erro = "";
$dadosPedido = [];

// Verifica se o formulário de consulta foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['pedidob']) && !isset($_POST['salvar'])) {
    // Obtém o número do pedido do formulário
    $pedidob = $_POST['pedidob'];

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta ao banco de dados
    $sql = "SELECT * FROM produtos WHERE pedidob = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $pedidob);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verifica se há resultados
        if ($result->num_rows > 0) {
            // Exibindo as informações do pedido
            $resultado .= "<h2>Informações do Pedido</h2>";
            while ($row = $result->fetch_assoc()) {
                $resultado .= "Nome do Produto: " . htmlspecialchars($row['nome_produto']) . "<br>";
                $resultado .= "Quantidade: " . htmlspecialchars($row['qtd_prod']) . "<br><br>"; // Adiciona espaçamento entre as informações

                // Adiciona os dados para o formulário de inserção na nova tabela
                $dadosPedido[] = [
                    'pedidob' => htmlspecialchars($row['pedidob']),
                    'nome_produto' => htmlspecialchars($row['nome_produto']),
                    'qtd_prod' => htmlspecialchars($row['qtd_prod']),
                ];
            }
        } else {
            $erro = "Nenhum pedido encontrado com esse número.";
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
    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Itera sobre os produtos enviados no formulário
    foreach ($_POST['produtos'] as $produto) {
        $pedidob = $produto['pedidob'];
        $nome_produto = $produto['nome_produto'];
        $qtd_prod = $produto['qtd_prod'];
        $avariado = isset($produto['avariado']) ? 1 : 0;
        $faltando = isset($produto['faltando']) ? 1 : 0;
        $observacoes = $produto['comentarios'];
        $data_registro = date('Y-m-d'); // Data atual

        // Inserção na nova tabela
        $sql = "INSERT INTO vistoriacarga (pedidob, nome_produto, qtd_prod, avariado, faltando, observacoes, data_registro) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssiiiss", $pedidob, $nome_produto, $qtd_prod, $avariado, $faltando, $observacoes, $data_registro);

            if (!$stmt->execute()) {
                $erro = "Erro ao salvar os dados: " . $stmt->error;
                break;
            }
        } else {
            $erro = "Erro na preparação da consulta: " . $conn->error;
            break;
        }
    }

    if (empty($erro)) {
        $resultado = "Dados salvos com sucesso!";
    }

    $conn->close();
}

// Verifica se o formulário de salvamento foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Itera sobre os produtos enviados no formulário
    foreach ($_POST['produtos'] as $produto) {
        $pedidob = $produto['pedidob'];
        $nome_produto = $produto['nome_produto'];
        $qtd_prod = $produto['qtd_prod'];
        $avariado = isset($produto['avariado']) ? 1 : 0;
        $faltando = isset($produto['faltando']) ? 1 : 0;
        $observacoes = $produto['comentarios'];

        // Inserção na nova tabela
        $sql = "INSERT INTO vistoriacarga (pedidob, nome_produto, qtd_prod, avariado, faltando, observacoes) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssisii", $pedidob, $nome_produto, $qtd_prod, $avariado, $faltando, $observacoes);

            if (!$stmt->execute()) {
                $erro = "Erro ao salvar os dados: " . $stmt->error;
                break;
            }
        } else {
            $erro = "Erro na preparação da consulta: " . $conn->error;
            break;
        }
    }

    if (empty($erro)) {
        $resultado = "Dados salvos com sucesso!";
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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

        body {
            font-family: "Poppins", sans-serif;
            background-color: #ffff;
            margin: 0;
            min-height: 100vh;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            display: block;
            justify-content: center;
            align-items: center;
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
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: rgb(37, 91, 140);
        }

        .back-button i {
            margin-right: 5px;
        }

        h2 {
            color: rgb(37, 91, 168);
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: inset 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            padding: 10px 20px;
            width: 100%;
            border: none;
            border-radius: 4px;
            background-color: rgb(37, 91, 168);
            color: white;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
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
    <?php
    include "../../../sidebarALU.php";
    ?>
    <div class="container">
        <!-- Formulário de consulta -->
        <form action="vistoriaCarga.php" method="post">
            <label for="pedidob">Número do Pedido:</label>
            <input type="text" id="pedidob" name="pedidob" required>
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
                        <?php foreach ($dadosPedido as $index => $produto) { ?>
                            <div class="product-container">
                                <h3>Produto <?php echo $index + 1; ?></h3>
                                <input type="hidden" name="produtos[<?php echo $index; ?>][pedidob]" value="<?php echo $produto['pedidob']; ?>">
                                <input type="hidden" name="produtos[<?php echo $index; ?>][nome_produto]" value="<?php echo $produto['nome_produto']; ?>">
                                <input type="hidden" name="produtos[<?php echo $index; ?>][qtd_prod]" value="<?php echo $produto['qtd_prod']; ?>">

                                <label for="avariado_<?php echo $index; ?>">Avariado?</label>
                                <input type="checkbox" id="avariado_<?php echo $index; ?>" name="produtos[<?php echo $index; ?>][avariado]" value="1"><br>

                                <label for="faltando_<?php echo $index; ?>">Faltando?</label>
                                <input type="checkbox" id="faltando_<?php echo $index; ?>" name="produtos[<?php echo $index; ?>][faltando]" value="1"><br>

                                <label for="comentarios_<?php echo $index; ?>">Observações:</label>
                                <input type="text" id="comentarios_<?php echo $index; ?>" name="produtos[<?php echo $index; ?>][comentarios]"><br>
                            </div>
                        <?php } ?>

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