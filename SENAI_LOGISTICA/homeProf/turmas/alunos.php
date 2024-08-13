<?php
include "../../";
$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "senai";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao->connect_errno) {
    die("Failed to connect to MySQL: " . $conexao->connect_error);
}

$turma_id = $_GET['turma_id'] ?? '';
if (empty($turma_id)) {
    die("Turma ID não fornecido.");
}

$sql = "SELECT * FROM `alunos` WHERE `turma_id` = '$turma_id'";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos da Turma</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 80%;
            max-width: 800px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .button-79 {
            display: block;
            margin: 0 auto 20px;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .divTable {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .modal-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Alunos da Turma</h1>
        <form method="post" action="salvar_alunos.php">
            <input type="hidden" name="turma_id" value="<?= $turma_id ?>">
            <div class="divTable">
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Senha</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $resultado->fetch_assoc()): ?>
                            <tr>
                                <td>
                                    <input type="text" name="nome[]" value="<?= htmlspecialchars($row['nome']) ?>" required>
                                </td>
                                <td>
                                    <input type="text" name="senha[]" value="<?= htmlspecialchars($row['senha']) ?>" required>
                                </td>
                                <td>
                                    <button type="button" onclick="gerarSenha(this)">Gerar Senha</button>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
            <button class="button-79" type="submit">Salvar Alterações</button>
        </form>
    </div>

    <script>
        function gerarSenha(button) {
            const senha = Math.random().toString(36).substring(2, 7);
            const inputSenha = button.closest('tr').querySelector('input[name="senha[]"]');
            inputSenha.value = senha;
        }
    </script>
</body>
</html>

<?php $conexao->close(); ?>
