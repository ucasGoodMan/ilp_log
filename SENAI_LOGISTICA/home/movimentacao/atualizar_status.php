<body>
<a href="estoque.php">Retornar a tela de atualizacao de vagas</a>
</body>
<br><br><br>
<?php
// Conexão ao banco de dados (substitua pelas suas credenciais)
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "senai";

// Dados recebidos via GET
$vaga = $_GET['vaga'];
$status = $_GET['status'];

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

    // Atualiza o status da vaga no banco de dados
    $updateSql = "UPDATE estoque SET status = '$status' WHERE vaga = '$vaga'";
    if ($conn->query($updateSql) === TRUE) {
        echo "Status da vaga $vaga atualizado para $status.";
    } else {
        echo "Erro ao atualizar o status da vaga: " . $conn->error;
    }

// Fecha a conexão
$conn->close();
?>
