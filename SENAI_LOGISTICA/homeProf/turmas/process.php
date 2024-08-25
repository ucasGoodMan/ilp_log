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
            if (!$conexao->query($sql)) {
                echo "Erro ao atualizar a turma: " . $conexao->error;
            }

            // Verifica a quantidade atual de alunos na turma
            $result = $conexao->query("SELECT COUNT(*) AS total FROM `alunos` WHERE `turma_id`='$id'");
            if ($result) {
                $row = $result->fetch_assoc();
                $totalAlunos = (int) $row['total'];

                // Adiciona ou remove alunos conforme necessário
                if ($qntalunos > $totalAlunos) {
                    for ($i = $totalAlunos + 1; $i <= $qntalunos; $i++) {
                        $nome_aluno = "aluno" . $i;
                        $senha_aluno = "senha" . $i;
                        $sql_aluno = "INSERT INTO `alunos` (`nome`, `senha`, `turma_id`) VALUES ('$nome_aluno', '$senha_aluno', '$id')";
                        if (!$conexao->query($sql_aluno)) {
                            echo "Erro ao adicionar aluno: " . $conexao->error;
                        }
                    }
                } elseif ($qntalunos < $totalAlunos) {
                    for ($i = $totalAlunos; $i > $qntalunos; $i--) {
                        $nome_aluno = "aluno" . $i;
                        $sql_aluno = "DELETE FROM `alunos` WHERE `nome` = '$nome_aluno' AND `turma_id` = '$id' LIMIT 1";
                        if (!$conexao->query($sql_aluno)) {
                            echo "Erro ao remover aluno: " . $conexao->error;
                        }
                    }
                }
            } else {
                echo "Erro ao buscar alunos: " . $conexao->error;
            }
        } else {
            // Insere nova turma
            $sql = "INSERT INTO `turma` (`nturma`, `nometurma`, `qntalunos`) VALUES ('$nturma', '$nometurma', '$qntalunos')";
            if ($conexao->query($sql) === TRUE) {
                $turma_id = $conexao->insert_id;

                // Insere os alunos automaticamente
                for ($i = 1; $i <= $qntalunos; $i++) {
                    $nome_aluno = "aluno" . $i;
                    $senha_aluno = "senha" . $i;
                    $sql_aluno = "INSERT INTO `alunos` (`nome`, `senha`, `turma_id`) VALUES ('$nome_aluno', '$senha_aluno', '$turma_id')";
                    if (!$conexao->query($sql_aluno)) {
                        echo "Erro ao adicionar aluno: " . $conexao->error;
                    }
                }
            } else {
                echo "Erro: " . $conexao->error;
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
