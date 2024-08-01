<?php
// Conectar ao banco de dados
$conn = new mysqli("localhost", "root", "root", "senai");

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se as variáveis necessárias estão definidas
if (!isset($_POST['solicitacao']) || !isset($_POST['doca'])) {
    die('Dados não enviados corretamente.');
}

$solicitacao = $_POST['solicitacao'];
$doca = $_POST['doca'];

// Preparar a consulta SQL para atualizar a tabela 'expedidos'
$sql = "UPDATE expedidos 
        SET doca = ?
        WHERE pedidob = ?";

// Preparar a declaração
$stmt = $conn->prepare($sql);

// Verificar se a preparação da declaração foi bem-sucedida
if ($stmt === false) {
    die('Erro na preparação da consulta: ' . $conn->error);
}

// Vincular os parâmetros
$stmt->bind_param("ss", $doca, $solicitacao);

// Executar a declaração
if ($stmt->execute() === false) {
    die('Erro ao executar a consulta: ' . $stmt->error);
} else {
    echo "Dados atualizados com sucesso!";
}

// Fechar a declaração e a conexão
$stmt->close();
$conn->close();
?>
