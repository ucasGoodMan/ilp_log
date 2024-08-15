<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redireciona para a página de login
    header('Location: ../../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleProf.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Home Docente</title>

</head>

<body>
    <?php
    include "../sidebarPROF.php";
    ?>
    <section class="home-section">
        <i class='bx bx-menu'></i>
        <span class="text">Home do Docente</span>
        <span class="prof">Bem vindo, Docente</span>
        <img class="imgProf" src="../imagens/Classroom-cuate.svg" alt="Professor img">
    </section>
    <script src="sidebar.js"></script>
</html>