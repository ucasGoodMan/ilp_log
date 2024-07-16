<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "senai";


    // Dados recebidos via POST
    $statusVaga = $_POST['statusVaga'];
    $status = $_POST['status'];

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    } else{
        echo "matar o if";
    }



    // Atualiza a carga da vaga no banco de dados
    $updateSql = "UPDATE estoque SET status = ?, pesoProd = ? WHERE statusVaga = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param('sis', $status, $pesoProd, $statusVaga);
    if ($stmt->execute() === TRUE) {
        echo "Carga da vaga $statusVaga atualizada para $pesoProd.";
    }else{
        echo "matar o if2";
    }
    // Pega os parâmetros da URL
    $vaga = $_GET['vaga'];
    $statusVaga = $_GET['status'];

    // Atualiza o status da vaga no banco de dados
    $updateSql = "UPDATE estoque SET status = '$statusVaga' WHERE posicao = '$vaga'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Status da vaga $vaga atualizado para $statusVaga.";

    } else {
        echo "Erro ao atualizar o status da vaga: " . $conn->error;
    }

    // Fecha a conexão
    $stmt->close();
    $conn->close();
?>