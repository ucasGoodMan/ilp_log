<?php
// auth.php

session_start();

if (!isset($_SESSION['id'])) {
    // Se não houver sessão ativa, redireciona para a página de login
    header('Location: http://localhost/ilp_log/SENAI_LOGISTICA/index.php');
    exit();
}
?>
