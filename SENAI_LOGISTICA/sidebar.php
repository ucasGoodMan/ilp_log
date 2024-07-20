<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>Document</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img class="img1" src="imagens/ILP ICONE BRANCO sf.png" alt="LUCA">
            <span class="logo_name">ILP LOG</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="site.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="site.php">
                        <i class="fa-solid fa-truck"></i>
                        <span class="link_name">Recebimento</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Recebimento</a></li>
                    <li><a href="../home/recebimento/Container/recebimento_container.php">Container</a></li>
                    <li><a href="../home/recebimento/CARGA/carga.php">Carga</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="">
                        <i class="fa-solid fa-sliders"></i>
                        <span class="link_name">Controle</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Controle</a></li>
                    <li><a href="movimentacao\docaRecebimento.php">Doca de recebimento</a></li>
                    <li><a href="../home/movimentacao/estadoEstoque.php">Esssstoque</a></li>
                </ul>
            </li>
            <li>
                <a href="movimentacao\solicitacoesMovimentacao.php">
                    <i class="fa-solid fa-dolly"></i>
                    <span class="link_name">Movimentação</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="">Movimentação</a></li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-hand-holding"></i>
                    <span class="link_name">Picking</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="">Picking</a></li>
                </ul>
            <li>
                <a href="">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span class="link_name">Expedição</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="">Expedição</a></li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span class="link_name">Estoque</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="">Estoque</a></li>
                </ul>
            </li>
            <li>
                <a href="">
                    <i class="fa-solid fa-receipt"></i>
                    <span class="link_name">Relatórios</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="">Relatórios</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <i class='bx bx-log-out'></i>
                    <img src="imagens/senai-logo-1.png" alt="senai">
                </div>
            </li>
        </ul>
        <script>
            let arrow = document.querySelectorAll(".arrow")
            for (var i = 0; i < arrow.length; i++) {
                arrow[i].addEventListener("click", (e) => {
                    let arrowParent = e.target.parentElement.parentElement;
                    arrowParent.classList.toggle("showMenu");
                });
            }

            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".bx-menu");
            sidebarBtn.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            });
            console.log(sidebarBtn);
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

            * {
                font-family: "Poppins", sans-serif;
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                width: 280px;
                background: rgb(37, 91, 168);
                z-index: 100;
                transition: all 0.5s ease;
            }

            .sidebar.close {
                width: 78px;
            }

            .sidebar .logo-details .img1 {
                height: 40px;
                width: 40px;
                margin-left: 20px;

            }

            .sidebar .logo-details {
                margin-bottom: 15px;
                height: 60px;
                width: 100%;
                display: flex;
                align-items: center;

            }

            .sidebar .logo-details i {
                font-size: 30px;
                color: #fff;
                height: 50px;
                min-width: 78px;
                text-align: center;
                line-height: 50px;
            }

            .sidebar .logo-details .logo_name {
                margin-left: 25px;
                font-size: 25px;
                color: #fff;
                font-weight: 600;
                transition: 0.3s ease;
                transition-delay: 0.1s;
            }

            .sidebar.close .logo-details .logo_name {
                transition-delay: -0.2s;
                opacity: 0;
                pointer-events: none;
            }

            .sidebar .nav-links {
                height: 100%;
                padding-top: 30px 0 150px 0;
            }

            .sidebar.close .nav-links {
                overflow: visible;
            }

            .sidebar .nav-links li {
                position: relative;
                list-style: none;
                transition: all 0.4s ease;
            }

            .sidebar .nav-links li:hover {
                background: rgb(26, 66, 121);
            }

            .sidebar .nav-links .iocn-links {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }

            .sidebar.close .nav-links .iocn-links {
                display: block;
            }

            .sidebar .nav-links li i {
                height: 50px;
                min-width: 78px;
                text-align: center;
                line-height: 50px;
                color: #fff;
                font-size: 20px;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .sidebar .nav-links li.showMenu i.arrow {
                transform: rotate(-180deg);
            }

            .sidebar.close .nav-links i.arrow {
                display: none;
            }

            .sidebar .nav-links li a {
                text-decoration: none;
                display: flex;
                align-items: center;
            }

            .sidebar .nav-links li a .link_name {
                font-size: 18px;
                font-weight: 400;
                color: #fff;
            }

            .sidebar.close .nav-links li a .link_name {
                opacity: 0;
                pointer-events: none;
            }

            .sidebar .nav-links li .sub-menu {
                padding: 6px 6px 14px 80px;
                margin-top: -10px;
                background: rgb(26, 66, 121);
                display: none;
            }

            .sidebar .nav-links li.showMenu .sub-menu {
                display: block;
            }

            .sidebar .nav-links li .sub-menu a {
                color: #fff;
                font-size: 15px;
                padding: 5px 0;
                white-space: nowrap;
                opacity: 0.6;
                transition: all 0.3 ease;
            }

            .sidebar .nav-links li .sub-menu a:hover {
                opacity: 1;
            }

            .sidebar.close .nav-links li .sub-menu {
                position: absolute;
                left: 100%;
                top: -10px;
                margin-top: 0;
                padding: 10px 20px;
                border-radius: 0 6px 6px 0;
                opacity: 0;
                display: block;
                pointer-events: none;
                transition: 0s;
            }

            .sidebar.close .nav-links li:hover .sub-menu {
                top: 0;
                opacity: 1;
                pointer-events: auto;
                transition: all 0.4s ease;
            }

            .sidebar.close .nav-links li .sub-menu .link_name {
                display: none;
            }

            .sidebar .nav-links li .sub-menu .link_name {
                display: none;
            }

            .sidebar.close .nav-links li .sub-menu .link_name {
                font-size: 18px;
                opacity: 1;
                display: block;
            }

            .sidebar.close .nav-links li .sub-menu.blank {
                opacity: 1;
                pointer-events: auto;
                padding: 3px 20px 6px 16px;
                opacity: 0;
                pointer-events: none;
            }

            .sidebar.close .nav-links li:hover .sub-menu.blank {
                top: 50%;
                transform: translateY(-50%);
            }

            .sidebar .profile-details {
                position: fixed;
                bottom: 0;
                width: 280px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 6px 0;
                transition: all 0.5s ease;
            }

            .sidebar.close .profile-details {
                background: none;
            }

            .sidebar.close .profile-details {
                width: 78px;
            }

            .sidebar .profile-details .profile-content {
                display: flex;
                align-items: center;
            }

            .sidebar .profile-details img {
                height: 55px;
                width: 180px;
                object-fit: cover;
                margin: 0 14px 0 12px;
                padding: 10px;
                transition: all 0.5s ease;
                margin-left: -15px;
            }


            .sidebar.close .profile-details img {
                display: none;
            }

            .sidebar .profile-details .profile-name,
            .sidebar .profile-details .job {
                color: #fff;
                font-size: 18px;
                font-weight: 500;
                white-space: nowrap;
            }


            .sidebar.close .profile-details i,
            .sidebar.close .profile-details .profile-name,
            .sidebar.close .profile-details .job {
                display: none;
            }

            .sidebar .profile-details .job {
                font-size: 12px;
            }

            .sidebar.close~.home-section {
                left: -220px;
                position: absolute;
            }
        </style>
    </div>
</body>

</html>