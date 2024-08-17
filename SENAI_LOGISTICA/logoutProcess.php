<?php
// Inicia a sessão se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Destroi todos os dados da sessão
$_SESSION = []; // Limpa o array $_SESSION

// Limpa o cookie de sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroi a sessão
session_destroy(); 

// Redireciona para a página de login
header('Location: http://localhost/ilp_log/SENAI_LOGISTICA/');
exit();
?>
