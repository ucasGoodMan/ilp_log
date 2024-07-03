<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "root"; 
$database = "senai";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao->connect_error;
    exit();
} else {
    // Verifique se o método de solicitação é POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Evita caracteres especiais (SQL Inject)
        $nturma = $conexao->real_escape_string($_POST['nturma']);
        $nometurma = $conexao->real_escape_string($_POST['nometurma']);
        $qntalunos = $conexao->real_escape_string($_POST['qntalunos']);

        // Verifique se os valores não estão vazios
        if (!empty($nturma) && !empty($nometurma) && !empty($qntalunos)) {
            $sql = "INSERT INTO `turma` (`nturma`, `nometurma`, `qntalunos`) VALUES ('$nturma', '$nometurma', '$qntalunos')";

            if ($conexao->query($sql) === TRUE) {
                echo "Novo registro criado com sucesso";
                header('Location: ../alunos/turmas.php', true, 301);
                exit();
            } else {
                echo "Erro: " . $sql . "<br>" . $conexao->error;
            }
        } else {
            echo "Por favor, preencha todos os campos.";
        }
    }
    $conexao->close();
}
?>