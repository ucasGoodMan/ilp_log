<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "root"; 
$database = "senai";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    die("Failed to connect to MySQL: " . $conexao->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $conexao->real_escape_string($_POST['id']) : '';
    $nturma = $conexao->real_escape_string($_POST['nturma']);
    $nometurma = $conexao->real_escape_string($_POST['nometurma']);
    $qntalunos = (int) $conexao->real_escape_string($_POST['qntalunos']);

    if (!empty($nturma) && !empty($nometurma) && !empty($qntalunos)) {
        if ($id) {
            // Atualiza a turma existente
            $sql = "UPDATE `turma` SET `nturma`='$nturma', `nometurma`='$nometurma', `qntalunos`='$qntalunos' WHERE `id`='$id'";
            $conexao->query($sql);

            // Verifica a quantidade atual de alunos na turma
            $result = $conexao->query("SELECT COUNT(*) AS total FROM `alunos` WHERE `turma_id`='$id'");
            $row = $result->fetch_assoc();
            $totalAlunos = (int) $row['total'];

            // Se a nova quantidade for maior, adiciona mais alunos
            if ($qntalunos > $totalAlunos) {
                for ($i = $totalAlunos + 1; $i <= $qntalunos; $i++) {
                    $nome_aluno = "aluno" . $i;
                    $senha_aluno = "senha" . $i;  // Senha padrão para novos alunos
                    $sql_aluno = "INSERT INTO `alunos` (`nome`, `senha`, `turma_id`) VALUES ('$nome_aluno', '$senha_aluno', '$id')";
                    $conexao->query($sql_aluno);
                }
            }
            // Se a nova quantidade for menor, remove os alunos excedentes
            elseif ($qntalunos < $totalAlunos) {
                for ($i = $totalAlunos; $i > $qntalunos; $i--) {
                    $nome_aluno = "aluno" . $i;
                    $sql_aluno = "DELETE FROM `alunos` WHERE `nome` = '$nome_aluno' AND `turma_id` = '$id' LIMIT 1";
                    $conexao->query($sql_aluno);
                }
            }
        } else {
            // Insere nova turma
            $sql = "INSERT INTO `turma` (`nturma`, `nometurma`, `qntalunos`) VALUES ('$nturma', '$nometurma', '$qntalunos')";
            if ($conexao->query($sql) === TRUE) {
                $turma_id = $conexao->insert_id;

                // Insere os alunos automaticamente
                for ($i = 1; $i <= $qntalunos; $i++) {
                    $nome_aluno = "aluno" . $i;
                    $senha_aluno = "senha" . $i;  // Senha padrão para novos alunos
                    $sql_aluno = "INSERT INTO `alunos` (`nome`, `senha`, `turma_id`) VALUES ('$nome_aluno', '$senha_aluno', '$turma_id')";
                    $conexao->query($sql_aluno);
                }
            } else {
                echo "Erro: " . $sql . "<br>" . $conexao->error;
            }
        }

        header('Location: turmas.php');
        exit();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}

$conexao->close();
?>
