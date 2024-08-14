<?php
session_start();
// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: ../login.php');
    exit();
}
?> 