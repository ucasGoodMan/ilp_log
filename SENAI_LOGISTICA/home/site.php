<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>SIDEBAR</title>


</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img class="img1" src="ILP ICONE BRANCO sf.png" alt="LUCAS">
            <span class="logo_name">ILP LOG</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="site.php">
                    <i class='bx bx-home' ></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="site.php">
                        <i class='bx bx-receipt'></i>
                        <span class="link_name">Recebimento</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Recebimento</a></li>
                    <li><a href="../home/recebimento/Container/recebimento_container.php">Container</a></li>
                    <li><a href="#">Carga</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="#">
                        <i class='bx bx-joystick-button' ></i>
                        <span class="link_name">Controle</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Controle</a></li>
                    <li><a href="#">Doca de recebimento</a></li>
                    <li><a href="#">Estoque</a></li>
                </ul>
            </li>   
            <li>
                <a href="#">
                    <i class='bx bx-sidebar'></i>
                    <span class="link_name">Movimentação</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Movimentação</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-sidebar'></i>
                    <span class="link_name">Picking</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Picking</a></li>
                </ul>
            <li>
                <a href="#">
                    <i class='bx bx-sidebar'></i>
                    <span class="link_name">Expedição</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Expedição</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-sidebar'></i>
                    <span class="link_name">Estoque</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Estoque</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-sidebar'></i>
                    <span class="link_name">Relatórios</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Relatórios</a></li>
                </ul>
            </li>
            <li>
            <div class="profile-details">
                    <i class='bx bx-log-out'></i>
                    <img src="senai-logo-1.png" alt="senai">
            </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
            <i class='bx bx-menu'></i>
            <span class="text">HOME</span>
    </section>
    <script src="sidebar.js"></script>
</body>

</html>