<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container</title>
    <style>
        * {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            justify-content: center;    
            max-width: 100%;
            max-height: 100%;
            padding: 20px;
            display: flex;
        }

        .form-column {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .bloco {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .checklist {
            margin-top: 20px;
        }

        .checklist label {
            font-weight: normal;
            margin: 5px 0;
        }

        input[type="submit"] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="container">
    <form method="post" action="process.php" id="form1" name="form1">

        <div class="form-column">
            <div class="bloco">
                <label>Placa do caminhão:</label>
                <input type="text" name="placa" id="placa" size="20">
            </div>

            <div class="bloco">
                <label>Nome do Motorista:</label>
                <input type="text" name="nomemotori" id="nomemotori" size="20">
            </div>

            <div class="bloco">
                <label>Container:</label>
                <input type="text" name="container" id="container" size="20">
            </div>

            <div class="bloco">
                <label>Navio:</label>
                <input type="text" name="navio" id="navio" size="20">
            </div>

            <div class="checklist">
                <label>Checklist:</label>
                <input type="checkbox" name="ContainerDesgastado" value="0"> Container Bem Desgastado <br>
                <input type="checkbox" name="AvariaLateralDireita" value="0"> Avaria Lateral Direita <br>
                <input type="checkbox" name="AvariaLateralEsquerda" value="0"> Avaria Lateral Esquerda <br>
                <input type="checkbox" name="AvariaTeto" value="0"> Avaria Teto <br>
                <input type="checkbox" name="AvariaFrente" value="0"> Avaria Frente <br>
            </div>
        </div>

        <div class="form-column">
            <div class="bloco">
                <label>Cliente:</label>
                <input type="text" name="cliente" id="cliente" size="20">
            </div>

            <div class="bloco">
                <label>Tipo:</label>
                <input type="text" name="tipo" id="tipo" size="20">
            </div>

            <div class="bloco">
                <label>Lacre:</label>
                <input type="text" name="lacre" id="lacre" size="20">
            </div>

            <div class="bloco">
                <label>IMO:</label>
                <input type="number" name="imo" id="imo" size="20">
            </div>

            <div class="checklist">
                <label>Checklist:</label>
                <input type="checkbox" name="SemLacre" value="0"> Sem Lacre <br>
                <input type="checkbox" name="AdesivoAvariado" value="0"> Adesivos Avariados <br>
                <input type="checkbox" name="ExcessoAltura" value="0"> Excesso de Altura <br>
                <input type="checkbox" name="ExcessoDireita" value="0"> Excesso Direita <br>
                <input type="checkbox" name="ExcessoEsquerda" value="0"> Excesso Esquerda <br>
            </div>
        </div>

        <div class="form-column">
            <div class="bloco">
                <label>Lacre SIF:</label>
                <input type="number" name="lacresif" id="lacresif" size="20">
            </div>

            <div class="bloco">
                <label>Nº ONU:</label>
                <input type="number" name="onu" id="onu" size="20">
            </div>

            <div class="bloco">
                <label>Temperatura:</label>
                <input type="number" name="temp" id="temp" size="20">
            </div>

            <div class="checklist">
                <label>Checklist:</label>
                <input type="checkbox" name="ExcessoFrontal" value="0"> Excesso Frontal <br>
                <input type="checkbox" name="PainelAvariado" value="0"> Painel Avariado <br>
                <input type="checkbox" name="SemCaboEnergia" value="0"> Sem Cabo Energia <br>
                <input type="checkbox" name="SemLona" value="0"> Sem Lona <br>
            </div>
        </div>
    </form>

    <div style="max-width: 1200px; margin: 20px auto; padding: 20px;">
    <input type="submit" value="Cadastrar">
</div>
</div>


</body>
</html>
