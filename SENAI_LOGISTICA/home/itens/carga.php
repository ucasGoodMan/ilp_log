<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleC.css">
    <title>Carga</title>
</head>
<body>



<div class="divContainer">
    <form method="post" action="process.php" id="form1" name="form1">
        <center>
     <input type="number" id="nPedido" placeholder="Numero do Pedido" size="10"><br>
    </center>
      <br><br><br><br>
      <br>    
    <div class="container">


   
            <div class="bloco">
                <label></label>
                <input type="text" id="placa1" placeholder="Produto" size="40"><br>
                
            </div>
           
            <div class="bloco">
                
                <input type="text" id="cliente1" placeholder="Unidade" size="12"><br>
               
            </div>


            <div class="bloco">
                
                <input type="number" id="coluna1" placeholder="Quantidade" size="1"><br>
               
            </div>


            <!-- Adicionando a tabela QTD2 -->
            <div class="bloco">
            
                <input type="text" id="valorUnit" placeholder="R$/unit " size="5"><br>
                
            </div>


            <div class="bloco1">
                
                <input type="alphanumeric" id="NCM" placeholder="NCM" size="3"><br>
              
            </div>

            <div class="bloco1">
                
                <input type="alphanumeric" id="CST" placeholder="CST" size="3"><br>
              
            </div>

            <div class="bloco1">
                
                <input type="alphanumeric" id="CFOP" placeholder="CFOP" size="3"><br>
              
            </div>

            <div>
            
            <input type="alphanumeric" id="doca" placeholder="Doca" size="10"><br>
            </div>

            <div>
                <input type="submit" id="enviar" value="Enviar">
            </div>
           
        </div>
    </form>
</div>


</body>
</html>





