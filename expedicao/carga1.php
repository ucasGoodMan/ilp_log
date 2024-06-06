<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela 1 expedição e separação</title>
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
            width: 12%;
            text-align: center;
            display: inline-block;
        }
        .okdetudo{
            margin-left: 29.8%;
        }
        .doca{
            margin-left: 13.7%;
            width: 5%;
        }
        .doca2{
            margin-left: 4.1%;
        }
        .process{
            margin-left: 27.6%;
        }
    </style>
</head>
<body>
    <div class="Container">
        <center><label>RECARREGAR PÁGINA ACARRETERÁ EM PERDA DAS INFORMAÇÕES</label></center><br>
        
        <form method="post" action="carga2.php" id="form1" name="form1">
            <label for='sltc1'>Solicitação Nº</label> 
            <input type="text" id='sltc1' name='sltc1'>
            <input type='submit' value='abrir'><br><br>

            <label for='sltc2'>Solicitação Nº</label> 
            <input type="text" id='sltc2' name='sltc2'>
            <input type='submit' value='abrir'><br><br>

            <label for='sltc3'>Solicitação Nº</label> 
            <input type="text" id='sltc3' name='sltc3'>
            <input type='submit' value='abrir'><br><br>

            <label for='sltc4'>Solicitação Nº</label> 
            <input type="text" id='sltc4' name='sltc4'>
            <input type='submit' value='abrir'><br><br>

            <label for='sltc5'>Solicitação Nº</label> 
            <input type="text" id='sltc5' name='sltc5'>
            <input type='submit' value='abrir'><br><br>
        </form>
    </div>
</body>
</html>
