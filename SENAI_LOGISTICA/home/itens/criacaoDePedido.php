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

        .texto1 {
            width: 10%; /* Reduzindo um pouco a largura para acomodar o terceiro bloco */
            text-align: center;
            display: inline;

        }

        .blocoB {
            width: 50%;
            text-align: center;
            display: inline;
            margin-top: 10%;
        }

        .blocoC {
            width: 80%;
            text-align: center;
            display: inline;
            margin-top: 10%;
        }
    </style>
</head>
<body>
 
<div class="textos">
    <form method="post" action="" id="form1" name="form1">
        
        <div class="texto1">
            <label>Placa do caminhão:</label><br>
            <input type="text" name="placa" id="placa" size="20"><br><br>
        </div>
       
        <div class="blocoB">
            <label>Cliente:</label><br>
            <input type="text" name="cliente" id="cliente" size="20"><br><br>
        </div>

        <div class="texto1">
            <label>Lacre SIF:</label><br>
            <input type="number" name="lacresif" id="lacresif" size="20"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Nome do Motorista:</label><br>
            <input type="text" name="nomemotori" id="nomemotori" size="20"><br><br>
        </div>

        <div class="texto1">
            <label>Tipo:</label><br>
            <input type="text" name="tipo" id="tipo" size="20"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Nº ONU:</label><br>
            <input type="number" name="onu" id="onu" size="20"><br><br>
        </div>    
        
        <div class="texto1">
            <label>Container:</label><br>
            <input type="text" name="container" id="container" size="20"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Lacre:</label><br>
            <input type="text" name="lacre" id="lacre" size="20"><br><br>
        </div>

        <div class="texto1">
            <label>Temperatura:</label><br>
            <input type="number" name="temp" id="temp" size="20"><br><br>
        </div>
            
        <div class="blocoC">
            <label>Navio:</label><br>
            <input type="text" name="navio" id="navio" size="20"><br><br>
        </div>

        <div class="blocoB">
            
        </div>

        <div class="blocoB">
            <label>IMO:</label><br>
            <input type="number" name="imo" id="imo" size="20"><br><br>
    </div class="botao" > 
        
    </div>
    

    </div>
    </form>
</div>

</form>

</body>
</html>