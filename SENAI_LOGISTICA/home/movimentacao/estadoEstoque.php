<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        table {
            position: relative;
            top: 100px;
            width: 50%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 8px;
        }

        th, td {
            border: 1px solid #f2f2f2;
            padding: 12px;
            text-align: center;
            font-size: 14px;
            background: #CDD6DD;
            width: 5%;
        }

        th {
            background-color: #255ba8;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            width: 10%;
        }

        .vaga {
            position: relative;
            height: 60px;
            width: 60px;
            text-align: center;
            font-size: 14px;
        }

        .vaga span {
            display: block;
            font-size: 12px;
            color: #666;
            margin-top: 6px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            margin-top: 8px;
        }

        .dropbtn {
            background: rgb(37, 91, 168);
            color: white;
            padding: 8px 12px;
            font-size: 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .dropbtn:hover {
            background: rgb(56, 130, 235);
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            border-radius: 4px;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 12px;
            transition: background-color 0.3s;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th></th>
            <?php
            foreach (range('A', 'E') as $letra) {
                echo "<th>Rua $letra</th>";
            }
            ?>
        </tr>
        <?php
  
        // Pesos correspondentes para os andares
        $pesos = [
            1 => '900kg',
            2 => '500kg',
            3 => '350kg',
            4 => '200kg',
            5 => '150kg'
        ];
    
        // Exibir vagas de A1 a E5 em linhas e colunas
        foreach (range(5, 1) as $linha) {
            echo "<tr>";
            // Exibir números (1, 2, 3, 4, 5) como cabeçalho da linha com peso correspondente
            echo "<th>Andar $linha<br><span>Peso: {$pesos[$linha]}</span></th>";
            
            foreach (range('A', 'E') as $letra) {
                $vaga = "$letra$linha";
                $status = isset($statusVagas[$vaga]) ? $statusVagas[$vaga] : "";
                echo "<td class='vaga' data-vaga='$vaga'>$vaga<br><span>Status: $status</span>";
                echo "<div class='dropdown'>";
       
                echo "<button class='dropbtn'>Alterar Status</button>";
                echo "<div class='dropdown-content'>";
                echo "<a href='atualizar_status.php?vaga=$vaga&status=Cheia'>Cheia</a><br>";
                echo "<a href='atualizar_status.php?vaga=$vaga&status=Quase Cheia'>Quase Cheia</a><br>";
                echo "<a href='atualizar_status.php?vaga=$vaga&status=Vazia'>Vazia</a>";
                echo "</div>";
                echo "</div>";
                echo "</td>"; 
            }
            echo "</tr>";
        }
        
        ?>
    </table>
</body>
</html>
