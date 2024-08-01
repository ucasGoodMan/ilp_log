<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "root", "senai");

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$solicitacao = $_POST['solicitacao'];
$doca = $_POST['doca'];

// Buscar os dados do pedido e produto
$sql = "SELECT ped.pedidob, ped.cod_prod, p.nome_produto, ped.un_prod, ped.qtd_prod, ped.data_entrega, ped.data_pedido, ped.observacoes
        FROM pedidos ped
        JOIN produto p ON ped.pedidob = p.pedidob
        WHERE ped.pedido = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $solicitacao);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pedidob = $row['pedidob'];
        $cod_prod = $row['cod_prod'];
        $nome_produto = $row['nome_produto'];
        $un_prod = $row['un_prod'];
        $qtd_prod = $row['qtd_prod'];
        $data_entrega = $row['data_entrega'];
        $data_pedido = $row['data_pedido'];
        $observacoes = $row['observacoes'];

        // Inserir os dados na tabela expedidos
        $insert_sql = "INSERT INTO expedidos (pedidob, cod_prod, nome_produto, un_prod, qtd_prod, data_entrega, data_pedido, observacoes, doca)
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ssssissss", $pedidob, $cod_prod, $nome_produto, $un_prod, $qtd_prod, $data_entrega, $data_pedido, $observacoes, $doca);
        $insert_stmt->execute();
    }
    echo "<p>Dados salvos com sucesso na tabela expedidos!</p>";
} else {
    echo "<p>Nenhum pedido encontrado para a solicitação nº $solicitacao.</p>";
}

$stmt->close();
$conn->close();
?>
