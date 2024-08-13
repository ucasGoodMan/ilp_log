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

// Consulta as turmas existentes
$sql = "SELECT * FROM `turma`";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="turmas.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Turmas</title>
</head>

<body>
    <div class="container">
        <h1>Cadastro de Turmas</h1>
        <button class="button-79" onclick="openModal()">Adicionar Turma</button>

        <div class="divTable">
            <table>
                <thead>
                    <tr>
                        <th>N° Turma</th>
                        <th>Nome da Turma</th>
                        <th>Quantidade de Alunos</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                        <th>Ver/Editar Alunos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $resultado->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['nturma'] ?></td>
                            <td><?= $row['nometurma'] ?></td>
                            <td><?= $row['qntalunos'] ?></td>
                            <td><button onclick="editTurma(<?= $row['id'] ?>, '<?= $row['nturma'] ?>', '<?= $row['nometurma'] ?>', '<?= $row['qntalunos'] ?>')">Editar</button></td>
                            <td><button onclick="deleteTurma(<?= $row['id'] ?>)">Excluir</button></td>
                            <td><button onclick="window.location.href='alunos.php?turma_id=<?= $row['id'] ?>'">Ver/Editar Alunos</button></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal-container" id="modal">
        <div class="modal">
            <form id="formulario" method="post" action="process.php">
                <input type="hidden" id="id" name="id">
                <label for="nturma">Nº da Turma</label>
                <input id="nturma" name="nturma" type="number" required />

                <label for="nometurma">Nome da Turma</label>
                <input id="nometurma" name="nometurma" type="text" required />

                <label for="qntalunos">Quantidade de Alunos</label>
                <input id="qntalunos" name="qntalunos" type="number" required min="1" max="50" />

                <button id="botao" type="submit">Salvar</button>
            </form>
            <button onclick="closeModal()">Fechar</button>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>

<?php $conexao->close(); ?>
