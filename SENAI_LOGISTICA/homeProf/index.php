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
    <div class="sidebar">
        <div class="logo-details">
            <img class="img1" src="../imagens/ILP ICONE BRANCO sf.png" alt="LUCAS">
            <span class="logo_name">ILP LOG</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../homeProf/index.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span class="link_name">Pedidos</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a href="..\homeProf\itens\pedidos.php">Pedidos</a></li>
                    <li><a href="../homeProf/itens/meuspedidos.php">Meus pedidos</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span class="link_name">Danfe</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Danfe</a></li>
                    <li><a href="">Minhas danfe</a></li>
                </ul>
            </li>

            <li>
                <a href="">
                    <i class="fa-solid fa-sliders"></i>
                    <span class="link_name">Controle</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="">Controle</a></li>
                </ul>
            <li>
                <div class="iocn-links">
                    <a href="">
                        <i class="fa-solid fa-address-card"></i>
                        <span class="link_name">Turmas</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Turmas</a></li>
                    <li><a href="../homeProf/turmas/turmas.php">Alunos</a></li>
                </ul>
            </li>
            <li> 
                
                <form action="../logoutProcess.php" method="POST" style="display:inline;">
                     <button type="submit" style="border: none; background: none; padding: 0; cursor: pointer;">
                     <div class="profile-details">
                       <i class='bx bx-log-out'></i> 
                    <img src="../imagens/senai-logo-1.png" alt="senai">
                    </div>
                  </button>
                </form>

            </li>
        </ul>
    </div>
    <section class="home-section">
        <i class='bx bx-menu'></i>
        <span class="text">Home do Docente</span>
        <span class="prof">Bem vindo, Docente</span>
        <img class="imgProf" src="../imagens/Classroom-cuate.svg" alt="Professor img">
    </section>
    <script src="sidebar.js"></script>
</html>