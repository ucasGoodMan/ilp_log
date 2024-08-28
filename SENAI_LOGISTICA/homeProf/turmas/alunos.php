<?php
include "../../sidebarPROF.php";
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
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            max-height: 80vh;
            overflow-y: auto;
        }

        .container::-webkit-scrollbar {
            width: 10px;
        }

        .container::-webkit-scrollbar-track {
            background: #f2f2f2;
            border-radius: 6px;
        }

        .container::-webkit-scrollbar-thumb {
            background-color: rgb(37, 91, 168);
            border-radius: 6px;
            border: 2px solid #ffffff;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: rgb(37, 91, 168);
            font-size: 28px;
            margin: 0;
        }

        .button-79 {
            margin-top: 20px;
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .button-79:hover {
            background-color: rgb(29, 70, 130);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
     
            color: black;
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }

        td input {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }

        .button-action {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .button-action:hover {
            background-color: rgb(29, 70, 130);
        }

        .button-action + .button-action {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
        <h1>Alunos da Turma</h1>
        </div>
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
                                <input type="hidden" name="aluno_id[]" value="<?= $row['id'] ?>">
                                <td>
                                    <input type="text" name="nome[]" value="<?= htmlspecialchars($row['nome']) ?>" required>
                                </td>
                                <td>
                                    <input type="text" name="senha[]" value="<?= htmlspecialchars($row['senha']) ?>" required>
                                </td>
                                <td>
                                    <button type="button" class="button-action" onclick="gerarSenha(this)">Gerar Senha</button>
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
