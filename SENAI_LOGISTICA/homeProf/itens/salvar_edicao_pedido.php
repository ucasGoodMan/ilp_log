<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['pedido_id']) && isset($_POST['data_entrega']) && isset($_POST['data_pedido']) && isset($_POST['observacoes']) && isset($_POST['produto_id'])) {
    $pedido_id = $_POST['pedido_id'];
    $data_entrega = $_POST['data_entrega'];
    $data_pedido = $_POST['data_pedido'];
    $observacoes = $_POST['observacoes'];
    
    // Atualiza o pedido
    $sql_update_pedido = "UPDATE pedidos SET data_entrega='$data_entrega', data_pedido='$data_pedido', observacoes='$observacoes' WHERE pedido='$pedido_id'";

    if ($conn->query($sql_update_pedido) === TRUE) {
        echo "Pedido atualizado com sucesso.<br>";
    } else {
        echo "Erro ao atualizar o pedido: " . $conn->error . "<br>";
    }
    
    // Atualiza os produtos
    $produto_ids = $_POST['produto_id'];
    $cod_prods = $_POST['cod_prod'];
    $nome_produtos = $_POST['nome_produto'];
    $un_prods = $_POST['un_prod'];
    $qtd_prods = $_POST['qtd_prod'];
    $rsunit_prods = $_POST['rsunit_prod'];
    $ncm_prods = $_POST['ncm_prod'];
    $cst_prods = $_POST['cst_prod'];
    $cfop_prods = $_POST['cfop_prod'];

    for ($i = 0; $i < count($produto_ids); $i++) {
        $produto_id = $produto_ids[$i];
        $cod_prod = $cod_prods[$i];
        $nome_produto = $nome_produtos[$i];
        $un_prod = $un_prods[$i];
        $qtd_prod = $qtd_prods[$i];
        $rsunit_prod = $rsunit_prods[$i];
        $ncm_prod = $ncm_prods[$i];
        $cst_prod = $cst_prods[$i];
        $cfop_prod = $cfop_prods[$i];
        
        $sql_update_produto = "UPDATE produtos SET 
            cod_prod='$cod_prod', 
            nome_produto='$nome_produto', 
            un_prod='$un_prod', 
            qtd_prod='$qtd_prod', 
            rsunit_prod='$rsunit_prod', 
            ncm_prod='$ncm_prod', 
            cst_prod='$cst_prod', 
            cfop_prod='$cfop_prod' 
            WHERE id='$produto_id'";
        
        if ($conn->query($sql_update_produto) === TRUE) {
            echo "Produto ID $produto_id atualizado com sucesso.<br>";
        } else {
            echo "Erro ao atualizar o produto ID $produto_id: " . $conn->error . "<br>";
        }
    }
} else {
    echo "Dados incompletos.";
}

$conn->close();
header('Location: meuspedidos.php', true, 301);
?>
