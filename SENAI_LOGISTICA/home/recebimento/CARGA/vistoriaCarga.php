<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Variáveis para armazenar o resultado da consulta
$resultado = "";
$erro = "";
$dadosPedido = [];

// Verifica se o formulário de consulta foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['npedido']) && !isset($_POST['salvar'])) {
    // Obtém o número do pedido do formulário
    $npedido = $_POST['npedido'];

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Consulta ao banco de dados
    $sql = "SELECT * FROM criacaopedido WHERE npedido = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $npedido);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se há resultados
    if ($result->num_rows > 0) {
        // Exibindo as informações do pedido
        $resultado .= "<h2>Informações do Pedido</h2>";
        while ($row = $result->fetch_assoc()) {
            $resultado .= "Número do Pedido: " . htmlspecialchars($row['npedido']) . "<br>";
            $resultado .= "Produtos: " . htmlspecialchars($row['produtos']) . "<br>";
            $resultado .= "Quantidade: " . htmlspecialchars($row['quantidade']) . "<br>";
            $resultado .= "Valor por Unidade: " . htmlspecialchars($row['vlrporunidade']) . "<br>";
            $resultado .= "Doca: " . htmlspecialchars($row['doca']) . "<br><br>";

            // Adiciona os dados para o formulário de inserção na nova tabela
            $dadosPedido = [
                'npedido' => htmlspecialchars($row['npedido']),
                'produtos' => htmlspecialchars($row['produtos']),
                'quantidade' => htmlspecialchars($row['quantidade']),
                'vlrporunidade' => htmlspecialchars($row['vlrporunidade']),
                'doca' => htmlspecialchars($row['doca']),
            ];
        }
    } else {
        $erro = "Nenhum pedido encontrado com esse número.";
    }

    // Fechando a conexão
    $stmt->close();
    $conn->close();
}

// Verifica se o formulário de salvamento foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['salvar'])) {
    // Obtém os dados do formulário
    $npedido = $_POST['npedido'];
    $produtos = $_POST['produtos'];
    $quantidade = $_POST['quantidade'];
    $vlrporunidade = $_POST['vlrporunidade'];
    $doca = $_POST['doca'];
    $checkAvaria = isset($_POST['checkAvaria']) ? 1 : 0;
    $checkFalta = isset($_POST['checkFalta']) ? 1 : 0;
    $comentarios = $_POST['comentarios'];

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificando a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    // Inserção na nova tabela
    $sql = "INSERT INTO vistoriacarga (npedido, produtos, quantidade, vlrporunidade, doca, avariado, faltando, observacoes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssisiiis", $npedido, $produtos, $quantidade, $vlrporunidade, $doca, $checkAvaria, $checkFalta, $comentarios);

    if ($stmt->execute()) {
        $resultado = "Dados salvos com sucesso!";
    } else {
        $erro = "Erro ao salvar os dados: " . $stmt->error;
    }

    // Fechando a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Pedido</title>
</head>
<body>

<!-- Formulário de consulta -->
<form action="vistoriaCarga.php" method="post">
    <label for="npedido">Número do Pedido:</label>
    <input type="text" id="npedido" name="npedido" required>
    <input type="submit" value="Consultar">
</form>

<?php
// Exibe o resultado ou a mensagem de erro
if ($resultado) {
    echo $resultado;

    // Exibe o formulário de salvamento apenas se houver resultados
    if (!empty($dadosPedido)) {
?>
    <h2>Salvar Informações Adicionais</h2>
    <form action="vistoriaCarga.php" method="post">
        <input type="hidden" name="npedido" value="<?php echo $dadosPedido['npedido']; ?>">
        <input type="hidden" name="produtos" value="<?php echo $dadosPedido['produtos']; ?>">
        <input type="hidden" name="quantidade" value="<?php echo $dadosPedido['quantidade']; ?>">
        <input type="hidden" name="vlrporunidade" value="<?php echo $dadosPedido['vlrporunidade']; ?>">
        <input type="hidden" name="doca" value="<?php echo $dadosPedido['doca']; ?>">

        <label for="checkAvaria">Avariado?</label>
        <input type="checkbox" id="checkAvaria" name="checkAvaria" value="1"><br>

        <label for="checkFalta">Faltando?</label>
        <input type="checkbox" id="checkFalta" name="checkFalta" value="1"><br>

        <label for="comentarios">Observações:</label>
        <input type="text" id="comentarios" name="comentarios"><br>

        <input type="hidden" name="salvar" value="1">
        <input type="submit" value="Salvar">
    </form>
<?php
    }
} elseif ($erro) {
    echo $erro;
}
?>

</body>
</html>
