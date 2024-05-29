<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimentação</title>
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
            width: 10%; /* Reduzindo um pouco a largura para acomodar o terceiro bloco */
            text-align: center;
            display: inline-block;
        }

        .bloco input {
            text-transform: uppercase;
        }
        .blocoB {
            width: 10%;
            text-align: center;
            display: inline-block;
        }

        .blocoB input {
            text-transform: uppercase;
        }

        .blocoC {
            width: 10%;
            text-align: center;
            display: inline-block;
        }

        .blocoC input{
            text-transform: uppercase;
        }


    </style>
</head>
<body>
 
<div class="Container">
    <form method="post" action="process.php" id="form1" name="form1">
        
        <div class="bloco">
            <label>Operações em Aberto</label><br><br>
            <label>Item</label><br>
            <input type="text" placeholder="Barbante" name="item" id="item" size="20"><br><br>
        </div>
       
        <div class="blocoB">
            <label>UN:</label><br>
            <input type="text" placeholder="RL" name="unidade" id="unidade" size="1"><br><br>
        </div>

        <div class="bloco">
            <label>Quantidade:</label><br>
            <input type="number" placeholder="5" name="quantidade" id="quantidade" size="5"><br><br>
        </div>
        
        <div class="blocoB">
            <label>Posição:</label><br>
            <input type="text" placeholder="B1" name="posicao" id="posicao" size="5"><br><br>
        </div>

        <div class="bloco">
            <br>
            <input type="submit" value="PEGAR" size="20"><br><br>
        </div>
    </form>

    </div>
    <br><br><br><br>

    
</div>
<form method="post" action="isacboiola.php">
    <button>CARALH</button>
</form>
</body>
</html>