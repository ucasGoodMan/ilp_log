<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "root"; 
$database = "senai";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    die("Failed to connect to MySQL: " . $conexao->connect_error);
}

if (isset($_GET['id'])) {
    $id = $conexao->real_escape_string($_GET['id']);
    $sql = "DELETE FROM `turma` WHERE `id`='$id'";

    if ($conexao->query($sql) === TRUE) {
        header('Location: turmas.php');
        exit();
    } else {
        echo "Erro ao excluir: " . $conexao->error;
    }
}

$conexao->close();
?>
