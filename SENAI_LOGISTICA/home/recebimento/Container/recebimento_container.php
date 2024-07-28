<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .divContainer {
            width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: rgb(37, 91, 140);
        }

        .back-button i {
            margin-right: 5px;
        }

        .container {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin-left: 50px;
        }

        .bloco, .blocoB, .blocoC {
            width: 30%;
            margin-bottom: 20px;
        }

        .blocoC {
            width: 30%;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            width: 100%;
            max-width: 250px; /* Adicionado para limitar a largura */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: rgb(37, 91, 140);
        }

        .checklist-container {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            margin-left: 50px;
        }

        .checklist {
            width: 30%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body> 
<a class="back-button" onclick="window.history.back();"><i class='bx bx-log-out'></i> Voltar</a>
<div class="divContainer">
    <form method="post" action="process.php" id="form1" name="form1">
        <div class="container">
            <div class="bloco">
                <label for="placa">Placa do caminhão:</label>
                <input type="text" name="placa" id="placa" size="20">
            </div>
            
            <div class="blocoB">
                <label for="cliente">Cliente:</label>
                <input type="text" name="cliente" id="cliente" size="20">
            </div>
            
            <div class="bloco">
                <label for="lacresif">Lacre SIF:</label>
                <input type="number" name="lacresif" id="lacresif" size="20">
            </div>
            
            <div class="blocoB">
                <label for="nomemotori">Nome do Motorista:</label>
                <input type="text" name="nomemotori" id="nomemotori" size="20">
            </div>
                
            <div class="bloco">
                <label for="tipo">Tipo:</label>
                <input type="text" name="tipo" id="tipo" size="20">
            </div>
            
            <div class="blocoB">
                <label for="onu">Nº ONU:</label>
                <input type="number" name="onu" id="onu" size="20">
            </div> 
            
            <div class="bloco">
                <label for="container">Container:</label>
                <input type="text" name="container" id="container" size="20">
            </div>
            
            <div class="blocoB">
                <label for="lacre">Lacre:</label>
                <input type="text" name="lacre" id="lacre" size="20">
            </div>
            
            <div class="bloco">
                <label for="temp">Temperatura:</label>
                <input type="number" name="temp" id="temp" size="20">
            </div>
                
            <div class="blocoC">
                <label for="navio">Navio:</label>
                <input type="text" name="navio" id="navio" size="20">
            </div>

            <div class="blocoB">
                <label for="imo">IMO:</label>
                <input type="number" name="imo" id="imo" size="20">
            </div>

        </div>
        
        <div class="checklist-container">
            <div class="checklist">
                <label>Checklist:</label>
                <input type="checkbox" name="ContainerDesgastado" value="0"> Container Bem Desgastado <br>
                <input type="checkbox" name="AvariaLateralDireita" value="0"> Avaria Lateral Direita <br>
                <input type="checkbox" name="AvariaLateralEsquerda" value="0"> Avaria Lateral Esquerda <br>
                <input type="checkbox" name="AvariaTeto" value="0"> Avaria Teto <br>
                <input type="checkbox" name="AvariaFrentre" value="0"> Avaria Frente <br>
            </div>
            <div class="checklist">
                <label>Checklist:</label>
                <input type="checkbox" name="SemLacre" value="0"> Sem Lacre <br>
                <input type="checkbox" name="AdesivoAvariado" value="0"> Adesivos Avariados <br>
                <input type="checkbox" name="ExcessoAltura" value="0"> Excesso de Altura <br>
                <input type="checkbox" name="ExcessoDireita" value="0"> Excesso Direita <br>
                <input type="checkbox" name="ExcessoEsquerda" value="0"> Excesso Esquerda <br>
            </div>
            <div class="checklist">
                <label>Checklist:</label>
                <input type="checkbox" name="ExcessoFrontal" value="0"> Excesso Frontal <br>
                <input type="checkbox" name="PainelAvariado" value="0"> Painel Avariado <br>
                <input type="checkbox" name="SemCaboEnergia" value="0"> Sem Cabo Energia <br>
                <input type="checkbox" name="SemLona" value="0"> Sem Lona <br>
            </div>
        </div>
        
        <div style="text-align: center;">
            <input type="submit" value="Cadastrar">
        </div>
    </form>
</div>

</body>
</html>
