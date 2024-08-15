<?php
   $servername = "localhost";
   $username = "root";
   $password = "root";
   $dbname = "senai";
   // Conexão com o banco de dados
   $conn = new mysqli("localhost", "root", "root", "senai");
    
    // Verifica a conexão
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    if (isset($_GET['vaga']) && isset($_GET['status']) && isset($_GET['peso'])) {
        $vaga = $_GET['vaga'];
        $status = $_GET['status'];
        $pesoItem = intval($_GET['peso']);
    
        // Verifica o peso máximo permitido na posição
        $sql = "SELECT pesoMaximo, pesoAtual FROM estoque WHERE posicaoVaga='$vaga'";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pesoAtual = $row['pesoAtual'];
            $pesoMaximo = $row['pesoMaximo'];
    
            // Atualiza o peso se ele não ultrapassar o peso máximo
            if ($pesoAtual + $pesoItem <= $pesoMaximo) {
                $novoPeso = $pesoAtual + $pesoItem;
                $sql = "UPDATE estoque SET statusVaga='$status', pesoAtual='$novoPeso' WHERE posicaoVaga='$vaga'";
    
                if ($conn->query($sql) === TRUE) {
                    echo "Status atualizado com sucesso";
                } else {
                    echo "Erro ao atualizar status: " . $conn->error;
                }
            } else {
                echo "Erro: O peso excede o máximo permitido!";
            }
        } else {
            echo "Erro: Vaga não encontrada!";
        }
    }
    
    $conn->close();
    header("Location: estadoEstoque.php");
    ?>