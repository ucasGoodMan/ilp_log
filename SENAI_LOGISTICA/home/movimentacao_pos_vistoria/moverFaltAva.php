<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai";

// Conexão ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida.<br>";

// Consulta para pegar produtos faltando ou avariados
$sql = "SELECT * FROM vistoriacarga WHERE avariado = 1 OR faltando = 1";
$result = $conn->query($sql);

// Verifica se a consulta foi bem-sucedida
if ($result === false) {
    die("Erro na execução da consulta SELECT: " . $conn->error);
}

echo "Consulta SELECT executada com sucesso.<br>";

// Verifica se há resultados
if ($result->num_rows > 0) {
    echo "Resultados encontrados: " . $result->num_rows . "<br>";

    // Insere os produtos na tabela pfaltava
    $sql_insert = "INSERT INTO pfaltava (produto_id, nome_produto, quantidade, status) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);

    if ($stmt_insert === false) {
        die("Erro na preparação da consulta INSERT: " . $conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        $status = $row["faltando"] ? "faltando" : "avariado";
        $stmt_insert->bind_param("isis", $row["pedidob"], $row["nome_produto"], $row["qtd_prod"], $status);
        
        if (!$stmt_insert->execute()) {
            echo "Erro ao inserir o produto ID " . $row["pedidob"] . ": " . $stmt_insert->error . "<br>";
        } else {
            echo "Produto ID " . $row["pedidob"] . " inserido com sucesso.<br>";
        }
    }

    // Atualiza a tabela vistoriacarga para marcar os itens como processados
    $sql_update = "UPDATE vistoriacarga SET avariado = 0, faltando = 0 WHERE avariado = 1 OR faltando = 1";
    $stmt_update = $conn->prepare($sql_update);

    if ($stmt_update === false) {
        die("Erro na preparação da consulta UPDATE: " . $conn->error);
    }

    if (!$stmt_update->execute()) {
        echo "Erro ao atualizar a tabela vistoriacarga: " . $stmt_update->error;
    } else {
        echo "Tabela vistoriacarga atualizada com sucesso!<br>";
    }
} else {
    echo "Nenhum produto faltando ou avariado encontrado.<br>";
}

$conn->close();
?>
