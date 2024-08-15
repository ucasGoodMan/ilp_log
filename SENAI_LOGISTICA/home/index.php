<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleS.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>SIDEBAR ALUNO</title>


</head>

<body>
    <div class="container">
    <div class="image-aluno">
            <img class="aluno" src="../imagens/Students-rafiki.svg" alt="Estudantes">
    </div>
    <div class="sidebar">
        <div class="logo-details">
            <img class="img1" src="../imagens/ILP ICONE BRANCO sf.png" alt="LUCAS">
            <span class="logo_name">ILP LOG</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="index.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li> 
                <div class="iocn-links">
                    <a href="index.php">
                        <i class="fa-solid fa-truck"></i>   
                        <span class="link_name">Recebimento</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Recebimento</a></li>
                    <li><a href="../home/recebimento/Container/recebimento_container.php">Container</a></li>
                    <li><a href="../home/recebimento/CARGA/vistoriaCarga.php">Carga</a></li>
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
                    <li><a href="movimentacao\docaRecebimento.php">Doca de recebimento<br>(solicitar movimentação)</a></li>
                    <li><a href="movimentacao\solicitacoesMovimentacao.php">Concluir movimentação<br> do item</a></li>
                </ul>
            </li>   
            <li>
                <div class="iocn-links">
                        <a href="">
                            <i class="fa-solid fa-truck-fast"></i>
                            <span class="link_name">Expedição</span> 
                        </a>
                        <i class='bx bx-chevron-down arrow'></i>
                    </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Expedição</a></li>
                    <li><a href="../home/picking/picking.php">Expedir</a></li>
                    <li><a href="../home/picking/processar_pedido.php">Pedido Carregado</a></li>
                </ul>
               
                </ul>
            </li>
            <li>
                <a href="../home/movimentacao/estadoEstoque.php">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span class="link_name">Estoque</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="../home/movimentacao/estadoEstoque.php">Estoque</a></li>
                </ul>
            </li>
            
            <li>
            <div class="profile-details">
            
                
                    <i class='bx bx-log-out'></i>
                    <img src="../imagens/senai-logo-1.png" alt="senai">
                    <a href="../../logout.php">Logout</a>
            </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <i class='bx bx-menu'></i>
        <span class="text">Home do aluno</span>
    </section>
    <script src="sidebar.js"></script>  
    </div>
</body>

</html>