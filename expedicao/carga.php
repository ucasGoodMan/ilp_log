<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela 2 Vistoria e Conferência - CARGA</title>
</head>
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
            width: 12%; /* Reduzindo um pouco a largura para acomodar o terceiro bloco */
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
    <datalist id="unidade">
                <option value="ROLO">
                <option value="PACOTE">
                <option value="CAIXA">
                <option value="METRO">
                <option value="PEÇA">
                <!-- ADICIONAR MAIS OPÇÕES AQUI -->
                </datalist>
    <datalist id='quantidade'>
                <option value="1">
                <option value="2">
                <option value="3">
                <option value="4">
                <option value="5">
                <!-- ADICIONAR MAIS OPÇÕES AQUI -->
                </datalist>
<body>
    <div class="Container">

    <center><label>RECARREGAR PÁGINA ACARRETERÁ EM PERDA DAS INFORMAÇÕES</LABEL></center><br>
<label>Solicitação Nº</label>
<input type="text">
<BR><BR>

  
<form method="post" action="process.php" id="form1" name="form1">
           
            <div class='bloco'>
            Produtos da Solicitação<br>
                <input type="text" placeholder='Insira aqui o item' name='item' id='item' size='20'><br>
                <input type="text" placeholder='Insira aqui o item' name='item' id='item' size='20'><br>
                <input type="text" placeholder='Insira aqui o item' name='item' id='item' size='20'><br>
                <input type="text" placeholder='Insira aqui o item' name='item' id='item' size='20'><br>
                <input type="text" placeholder='Insira aqui o item' name='item' id='item' size='20'><br>
                <input type="text" placeholder='Insira aqui o item' name='item' id='item' size='20'><br>
            </div>
            <div class='bloco'>
                Tipo de Unidade<br>
                <input type="text" list="unidade" id="tpUN">
                <input type="text" list="unidade" id="tpUN">
                <input type="text" list="unidade" id="tpUN">
                <input type="text" list="unidade" id="tpUN">
                <input type="text" list="unidade" id="tpUN">
                <input type="text" list="unidade" id="tpUN">             
            
            </DIV>
            <DIV class='bloco'>
                    QTD<BR>
                <input type="number" list="quantidade" id="qtd">
                <input type="text" list="quantidade" id="qtd">
                <input type="text" list="quantidade" id="qtd">
                <input type="text" list="quantidade" id="qtd">
                <input type="text" list="quantidade" id="qtd">
                <input type="text" list="quantidade" id="qtd">
            </div>

        
        
        <div class='bloco'>
            Observações<br>
            <input type='text' size='10'>
            <input type='text' size='10'>
            <input type='text' size='10'>
            <input type='text' size='10'>
            <input type='text' size='10'>
            <input type='text' size='10'> 
        </div>

        <div class='bloco'>
                <button type="button" onclick="placeboClick(event)">OK</button><br>
                <button type="button" onclick="placeboClick(event)">OK</button><br>
                <button type="button" onclick="placeboClick(event)">OK</button><br>
                <button type="button" onclick="placeboClick(event)">OK</button><br>
                <button type="button" onclick="placeboClick(event)">OK</button><br>
                <button type="button" onclick="placeboClick(event)">OK</button><br>
        </div>
        
        <br> <text class='doca'>Doca:
            <input type='text' size='2' class='doca2'>
         <button type="button" class='okdetudo' onclick="placeboClick(event)">OK de tudo</button><br> 


   <input type='submit' class='process' value='Pedido OK Carregado'>  
</form>
            

<script>
function placeboClick(event) {
    event.preventDefault(); // Impede o comportamento padrão do botão

}

</body>
</html>