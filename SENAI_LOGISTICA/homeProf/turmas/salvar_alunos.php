<?php
// Conexão com o banco de dados
$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "senai";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    die("Failed to connect to MySQL: " . $conexao->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $turma_id = isset($_POST['turma_id']) ? (int)$_POST['turma_id'] : 0;

    if ($turma_id) {
        // Atualiza todos os alunos da turma
        foreach ($_POST['nome'] as $index => $nome) {
            $nome = $conexao->real_escape_string($nome);
            $senha = $conexao->real_escape_string($_POST['senha'][$index]);
            $id = isset($_POST['aluno_id'][$index]) ? (int)$_POST['aluno_id'][$index] : 0;

            if ($id) {
                $sql = "UPDATE `alunos` SET `nome` = '$nome', `senha` = '$senha' WHERE `id` = $id";
                $conexao->query($sql);
            }
        }
    }

    header('Location: alunos.php?turma_id=' . $turma_id);
    exit();
}

$conexao->close();
?>
