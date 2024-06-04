<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Senhas</title>
</head>

<body>
    <?php
    // Função para gerar uma nova senha
    function gerarSenha($tamanho = 4) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $senha = '';
        for ($i = 0; $i < $tamanho; $i++) {
            $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
        }
        return $senha;
    }

    // Conectar ao banco de dados
    $hostname = "127.0.0.1";
    $user = "root";
    $password = "usbw";
    $database = "senai";

    $conexao = mysqli_connect($hostname, $user, $password, $database);

    if (!$conexao) {
        echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
        exit;
    }

    // Processar a alteração de senha se um e-mail de usuário específico foi enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
        $email = $_POST['email'];
        $novaSenha = gerarSenha();
        $sqlAtualizar = "UPDATE alunos SET senha='$novaSenha' WHERE email='$email'";
        if (mysqli_query($conexao, $sqlAtualizar)) {
            echo "<p>Senha alterada com sucesso para o e-mail: $email. Nova senha: $novaSenha</p>";
        } else {
            echo "<p>Erro ao alterar a senha: " . mysqli_error($conexao) . "</p>";
        }
    }

    // Consulta SQL para buscar os dados
    $tabela = "alunos";
    $colunas = "turma_id, email, senha"; // Selecione as colunas que você precisa
    $consulta = "SELECT $colunas FROM $tabela";

    // Executa a consulta e obtém os resultados
    $resultado = mysqli_query($conexao, $consulta);

    if (!$resultado) {
        echo "Falha na consulta SQL: " . mysqli_error($conexao);
        exit;
    }

    // Verifica se há resultados na consulta
    if (mysqli_num_rows($resultado) > 0) {
        // Exibe os dados em uma tabela HTML
        echo "<table border='1'>";
        echo "<tr>";
        // Exibe os nomes das colunas como cabeçalhos da tabela
        foreach (explode(", ", $colunas) as $coluna) {
            echo "<th>" . $coluna . "</th>";
        }
        echo "<th>Ação</th>";
        echo "</tr>";

        // Exibe os dados linha a linha
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            foreach ($linha as $coluna => $valor) {
                echo "<td>" . $valor . "</td>";
            }
            // Adiciona o botão de alterar senha apenas para este usuário
            echo <td>
                    <form method='post'>
                        <input type='hidden' name='email' value='" . $linha['email'] . "'>
                        <button type='submit'>Alterar Senha</button>
                    </form>
                  </td>;
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Não há resultados na consulta.";
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conexao);
    ?>
</body>

</html>