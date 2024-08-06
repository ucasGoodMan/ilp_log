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

    // Consulta para buscar os dados do pedido
    $sql_pedido = "SELECT * FROM pedidos WHERE pedido = '$pedido_id'";
    $result_pedido = $conn->query($sql_pedido);

    // Consulta para buscar os produtos do pedido
    $sql_produtos = "SELECT * FROM produtos WHERE pedidob = '$pedido_id'";
    $result_produtos = $conn->query($sql_produtos);

    if ($result_pedido->num_rows > 0 && $result_produtos->num_rows > 0) {
        $pedido = $result_pedido->fetch_assoc();
        
        // Exibe o formulário para editar o pedido e os produtos
        echo "<form action='salvar_edicao_pedido.php' method='POST'>";
        echo "<input type='hidden' name='pedido_id' value='" . $pedido_id . "'>";
        echo "Data de Entrega: <input type='date' name='data_entrega' value='" . $pedido['data_entrega'] . "'><br>";
        echo "Data do Pedido: <input type='date' name='data_pedido' value='" . $pedido['data_pedido'] . "'><br>";
        echo "Observações: <textarea name='observacoes'>" . $pedido['observacoes'] . "</textarea><br>";
        
        // Exibe o formulário para editar cada produto
        while ($produto = $result_produtos->fetch_assoc()) {
            echo "<h3>Produto ID: " . $produto['id'] . "</h3>";
            echo "<input type='hidden' name='produto_id[]' value='" . $produto['id'] . "'>";
            echo "Código: <input type='text' name='cod_prod[]' value='" . htmlspecialchars($produto['cod_prod']) . "'><br>";
            echo "Nome: <input type='text' name='nome_produto[]' value='" . htmlspecialchars($produto['nome_produto']) . "'><br>";
            echo "Unidade: <select name='un_prod[]'>";
            $unidades = ["caixa", "unidade", "peça", "kilograma", "litro", "palete", "pacote", "cartão", "rolo", "tonelada", "bloco", "saco", "fardo", "bandeja"];
            foreach ($unidades as $unidade) {
                $selected = ($unidade == $produto['un_prod']) ? "selected" : "";
                echo "<option value='$unidade' $selected>$unidade</option>";
            }
            echo "</select><br>";
            echo "Quantidade: <input type='number' name='qtd_prod[]' value='" . htmlspecialchars($produto['qtd_prod']) . "'><br>";
            echo "Preço Unitário: <input type='text' name='rsunit_prod[]' value='" . htmlspecialchars($produto['rsunit_prod']) . "'><br>";
            echo "NCM: <input type='text' name='ncm_prod[]' value='" . htmlspecialchars($produto['ncm_prod']) . "'><br>";
            echo "CST: <input type='text' name='cst_prod[]' value='" . htmlspecialchars($produto['cst_prod']) . "'><br>";
            echo "CFOP: <input type='text' name='cfop_prod[]' value='" . htmlspecialchars($produto['cfop_prod']) . "'><br>";
        }
        
        echo "<button type='submit'>Salvar</button>";
        echo "</form>";
    } else {
        echo "Pedido ou produtos não encontrados.";
    }
} else {
    echo "ID do pedido não fornecido.";
}

$conn->close();
?>
