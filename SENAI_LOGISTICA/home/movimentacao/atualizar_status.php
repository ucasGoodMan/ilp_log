<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "senai";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    } else {
        echo "Conexão bem-sucedida<br>";
    }

    // Pega os parâmetros da URL
    $statusVaga = isset($_GET['statusVaga']) ? $_GET['statusVaga'] : null;
    $vaga = isset($_GET['vaga']) ? $_GET['vaga'] : null;

    // Verifica se os parâmetros foram recebidos
    if ($statusVaga && $vaga) {
        // Atualiza o status da vaga no banco de dados
        $updateSql = "UPDATE estoque SET status = ? WHERE posicao = ?";
        $stmt = $conn->prepare($updateSql);

        if ($stmt) {
            $stmt->bind_param("ss", $statusVaga, $vaga);
            if ($stmt->execute()) {
                echo "Status da vaga $vaga atualizado para $statusVaga.<br>";
            } else {
                echo "Erro ao atualizar o status da vaga: " . $stmt->error . "<br>";
            }
            $stmt->close();
        } else {
            echo "Erro na preparação da consulta: " . $conn->error . "<br>";
        }
    } else {
        echo "Parâmetros 'statusVaga' e/ou 'vaga' não fornecidos.<br>";
    }

    // Fecha a conexão
    $conn->close();
?>
