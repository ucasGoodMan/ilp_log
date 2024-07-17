<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Container</title>
    <style>
        .divContainer {
            vertical-align: top;
            display: inline-block;
            width: 100%;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            margin-left: 16%;
            margin-right: 16%;
        }

        .bloco {
            width: 30%; /* Reduzindo um pouco a largura para acomodar o terceiro bloco */
            text-align: center;
            display: inline-block;
        }

        .blocoB {
            width: 30%;
            text-align: center;
            display: inline-block;
        }

        .blocoC {
            width: 30%;
            text-align: center;
            display: inline-block;
        }
    </style>
</head>
<body> 
 
<div class="Container">
    <form method="post" action="process.php" id="form1" name="form1">
        
        <div class="bloco">
            <label>Placa do caminhão:</label><br>
            <input type="text" name="placa" id="placa" size="20"><br><br>
        </div>
       
        <div class="blocoB">
            <label>Cliente:</label><br>
            <input type="text" name="cliente" id="cliente" size="20"><br><br>
        </div>

        <div class="bloco">
            <label>Lacre SIF:</label><br>
            <input type="number" name="lacresif" id="lacresif" size="20"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Nome do Motorista:</label><br>
            <input type="text" name="nomemotori" id="nomemotori" size="20"><br><br>
        </div>

        <div class="bloco">
            <label>Tipo:</label><br>
            <input type="text" name="tipo" id="tipo" size="20"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Nº ONU:</label><br>
            <input type="number" name="onu" id="onu" size="20"><br><br>
        </div>    
        
        <div class="bloco">
            <label>Container:</label><br>
            <input type="text" name="container" id="container" size="20"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Lacre:</label><br>
            <input type="text" name="lacre" id="lacre" size="20"><br><br>
        </div>

        <div class="bloco">
            <label>Temperatura:</label><br>
            <input type="number" name="temp" id="temp" size="20"><br><br>
        </div>
            
        <div class="blocoC">
            <label>Navio:</label><br>
            <input type="text" name="navio" id="navio" size="20"><br><br>
        </div>

        <div class="blocoB">
            <label>IMO:</label><br>
            <input type="number" name="imo" id="imo" size="20"><br><br>
        </div>

        </div>
        <br><br><br><br>
        <div class="divContainer">
        <div class="bloco">
            <label>Checklist:</label><br>
            <input type="checkbox" name="ContainerDesgastado" value="0"> Container Bem Desgastado <br>
            <input type="checkbox" name="AvariaLateralDireita" value="0"> Avaria Lateral Direita <br>
            <input type="checkbox" name="AvariaLateralEsquerda" value="0"> Avaria Lateral Esquerda <br>
            <input type="checkbox" name="AvariaTeto" value="0"> Avaria Teto <br>
            <input type="checkbox" name="AvariaFrentre" value="0"> Avaria Frente <br>
        </div>
        <div class="blocoB">
            <label>Checklist:</label><br>
            <input type="checkbox" name="SemLacre" value="0"> Sem Lacre <br>
            <input type="checkbox" name="AdesivoAvariado" value="0"> Adesivos Avariados <br>
            <input type="checkbox" name="ExcessoAltura" value="0"> Excesso de Altura <br>
            <input type="checkbox" name="ExcessoDireita" value="0"> Excesso Direita <br>
            <input type="checkbox" name="ExcessoEsquerda" value="0">Excesso Esquerda <br>
        </div>
        <div class="blocoB">
            <label>Checklist:</label><br>
            <input type="checkbox" name="ExcessoFrontal" value="0"> Excesso Frontal <br>
            <input type="checkbox" name="PainelAvariado" value="0"> Painel Avariado <br>
            <input type="checkbox" name="SemCaboEnergia" value="0"> Sem Cabo Energia <br>
            <input type="checkbox" name="SemLona" value="0"> Sem Lona <br>

        </div>
        <div><input type="submit" value="cadastrar"/></div>
    </form>
</div>

</body>
</html>