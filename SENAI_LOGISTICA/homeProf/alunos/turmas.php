<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="turmas.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <title>SIDEBAR</title>

</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <img class="img1" src="../imagens/ILP ICONE BRANCO sf.png" alt="LUCAS">
            <span class="logo_name">ILP LOG</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="HomeDoProf.php">
                    <i class="fa-solid fa-house"></i>
                    <span class="link_name">Home</span>
                </a>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="site.php">
                        <i class="fa-solid fa-file-circle-plus"></i>
                        <span class="link_name">Pedidos</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Pedidos</a></li>
                    <li><a href="../home/itens/pedidos.php">Criar pedidos</a></li>
                    <li><a href="#">Meus pedidos</a></li>
                </ul>
            </li>
            <li>
                <div class="iocn-links">
                    <a href="#">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        <span class="link_name">Danfe</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Danfe</a></li>
                    <li><a href="#">Criar danfe</a></li>
                    <li><a href="#">Minhas danfe</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-receipt"></i>
                    <span class="link_name">Relatório</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Relatório</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-sliders"></i>
                    <span class="link_name">Controle</span>
                </a>
                <ul class="sub-menu">
                    <li><a class="blank" href="#">Controle</a></li>
                </ul>
            <li>
                <div class="iocn-links">
                    <a href="#">
                        <i class="fa-solid fa-address-card"></i>
                        <span class="link_name">Aluno</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                    <li><a class="link_name">Aluno</a></li>
                    <li><a href="../homeProf/alunos/turmas.php">Turmas</a></li>
                </ul>
            </li>
            <li>
                <div class="profile-details">
                    <i class='bx bx-log-out'></i>
                    <img src="../imagens/senai-logo-1.png" alt="senai">
                </div>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <i class='bx bx-menu'></i>
        <span class="text">Turmas</span>
        <div class="container">
            <div class="header">
                <span>Cadastro de turmas</span>
                <button class="button-79" role="button" onclick="openModal()" id="new">Adicionar turma</i></button>
            </div>

            <div class="divTable">
                <table>
                    <thead>
                        <tr>
                            <th>N° Turma</th>
                            <th>Nome da turma</th>
                            <th>Quantidade de alunos</th>
                            <th class="acao">Editar</th>
                            <th class="acao">Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="modal-container">
                <div class="modal">
                    <form method="post" action="process.php">
                        <label for="id">N° da turma</label>
                        <input id="id" name="id" type="number" required />

                        <label for="nometurma">Nome da turma</label>
                        <input id="nometurma" name="nometurma" type="text" required />

                        <label for="qntalunos">Quantidade de alunos</label>
                        <input id="qntalunos" name="qntalunos" type="number" required />
                        <button id="btn" onclick=submitform()>Enviar</button>
                    </form>
                    <script type="text/javascript">
                        function submitform() {
                            document.formulario.submit();
                        }
                    </script>
                </div>
            </div>

        </div>
        <script src="script.js"></script>
    </section>
    <script src="sidebar.js"></script>


</html>