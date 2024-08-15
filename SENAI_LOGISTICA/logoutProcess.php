<?php
// Verifica se uma sessão já foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroi a sessão
session_destroy();

// Redireciona para a página de login
header('Location: ../SENAI_LOGISTICA/index.php');
exit();
?>
