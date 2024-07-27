<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "senai";


    // Dados recebidos via POST
    $statusVaga = $_POST['statusVaga'];

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    } else{
        echo "matar o if";
    }



    // Pega os parâmetros da URL
   
    $statusVaga = $_GET['statusVaga'];
    
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