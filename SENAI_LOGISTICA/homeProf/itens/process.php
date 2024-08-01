<?php
// Configuração do banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "root";
$dbname = "senai";

// Cria conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Obtém os dados do formulário
$pedido = isset($_POST['pedido']) ? $_POST['pedido'] : '';
$data_entrega = isset($_POST['data_entrega']) ? $_POST['data_entrega'] : '';
$data_pedido = isset($_POST['data_pedido']) ? $_POST['data_pedido'] : '';
$observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';

$cod = isset($_POST['cod']) ? $_POST['cod'] : [];
$produto = isset($_POST['produto']) ? $_POST['produto'] : [];
$un = isset($_POST['un']) ? $_POST['un'] : [];
$qtd = isset($_POST['qtd']) ? $_POST['qtd'] : [];
$rsunit = isset($_POST['rsunit']) ? $_POST['rsunit'] : [];
$ncm = isset($_POST['ncm']) ? $_POST['ncm'] : [];
$cst = isset($_POST['cst']) ? $_POST['cst'] : [];
$cfop = isset($_POST['cfop']) ? $_POST['cfop'] : [];

// Insere os dados do pedido na tabela pedidos
$sql_pedido = "INSERT INTO pedidos (pedido, data_entrega, data_pedido, observacoes) VALUES ('$pedido', '$data_entrega', '$data_pedido', '$observacoes')";

if ($conn->query($sql_pedido) === TRUE) {
    // Insere os dados dos produtos na tabela produtos
    for ($i = 0; $i < count($cod); $i++) {
        $cod_prod = $cod[$i];
        $nome_produto = $produto[$i];
        $un_prod = $un[$i];
        $qtd_prod = $qtd[$i];
        $rsunit_prod = $rsunit[$i];
        $ncm_prod = $ncm[$i];
        $cst_prod = $cst[$i];
        $cfop_prod = $cfop[$i];

        $sql_produto = "INSERT INTO produtos (pedidob, cod_prod, nome_produto, un_prod, qtd_prod, rsunit_prod, ncm_prod, cst_prod, cfop_prod) 
                        VALUES ('$pedido', '$cod_prod', '$nome_produto', '$un_prod', '$qtd_prod', '$rsunit_prod', '$ncm_prod', '$cst_prod', '$cfop_prod')";
        
        if ($conn->query($sql_produto) === FALSE) {
            echo "Erro ao inserir produto: " . $conn->error;
        }
    }

    echo "Pedido inserido com sucesso!";
} else {
    echo "Erro ao inserir pedido: " . $conn->error;
}

$conn->close();
header('Location: pedidos.php', true, 301);
exit;
?>
