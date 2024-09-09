<?php
$hostname = "127.0.0.1";
$user = "root";
$password = "root";
$database = "senai";

$conexao = new mysqli($hostname, $user, $password, $database);

if ($conexao -> connect_errno) {
    echo "Failed to connect to MySQL: " . $conexao -> connect_error;
    exit();
} else {
    // Evita caracteres especiais (SQL Inject)
    $email = $conexao -> real_escape_string($_POST['emailp']);
    $senha = $conexao -> real_escape_string($_POST['senhap']);

    // Verifica se o email e senha coincidem com algum registro no banco de dados
    $sql="SELECT `email` FROM `loginp`
          WHERE `email` = '".$email."'
          AND `senha` = '".$senha."';";

    $resultado = $conexao->query($sql);

    if($resultado->num_rows != 0) {
        session_start();
        $row = $resultado -> fetch_array();
        $_SESSION['id'] = $row['email'];  // Armazena o email na sessão
        $conexao -> close();

        // Redireciona para a página protegida
        header('Location: /ILP_LOG/SENAI_LOGISTICA/homeProf/index.php');
        exit();
    } else {
        $conexao -> close();
        // Redireciona de volta para a página de login em caso de falha
        header('Location: index.php');
        exit();
    }
}
?>
