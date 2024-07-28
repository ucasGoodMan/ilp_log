<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela - Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #f0f0f0;
            padding: 20px;
            border: 2px solid #ccc;
            width: 900px;
        }

        h1 {
            text-align: center;
            color: black;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 3fr 1fr 1fr 1fr 2fr 1fr 1fr 1fr;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }

        .label {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        input[type="text"], input[type="number"], textarea {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
        }

        textarea {
            resize: none;
        }

        button {
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
        }

        button:hover {
            background-color: rgb(29, 70, 130);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pedido de Compra</h1>
        <form>
            <div class="grid">
                <div class="label">Pedido Nº :</div>
                <input type="text" name="pedido" value="2345" style="grid-column: span 3;">
                <div class="label" style="grid-column: span 3;">data entrega</div>
                <input type="text" name="data_entrega" value="12/05/2024" style="grid-column: span 2;">
                <div class="label" style="grid-column: span 3;">data pedido</div>
                <input type="text" name="data_pedido" value="07/06/2024" style="grid-column: span 2;">
            </div>
            <div class="grid">
                <div class="label" style="grid-column: 1 / span 1;">COD. PROD (SKU)</div>
                <div class="label" style="grid-column: 2 / span 1;">Produtos</div>
                <div class="label" style="grid-column: 3 / span 1;">UN</div>
                <div class="label" style="grid-column: 4 / span 1;">QTC</div>
                <div class="label" style="grid-column: 5 / span 1;">R$/unit</div>
                <div class="label" style="grid-column: 6 / span 1;">NCM</div>
                <div class="label" style="grid-column: 7 / span 1;">CST</div>
                <div class="label" style="grid-column: 8 / span 1;">CFOP</div>
            </div>
            <div class="grid">
                <input type="text" name="cod1" value="A56fe0">
                <input type="text" name="produto1" value="Tesoura">
                <input type="text" name="un1" value="UN">
                <input type="number" name="qtd1" value="5">
                <input type="text" name="rsunit1" value="R$ 5,50">
                <input type="text" name="ncm1" value="88214596">
                <input type="text" name="cst1" value="200">
                <input type="text" name="cfop1" value="5102">
            </div>
            <div class="grid">
                <input type="text" name="cod2" value="846aj">
                <input type="text" name="produto2" value="Lápis">
                <input type="text" name="un2" value="UN">
                <input type="number" name="qtd2" value="8">
                <input type="text" name="rsunit2" value="R$ 1,20">
                <input type="text" name="ncm2" value="88912365">
                <input type="text" name="cst2" value="300">
                <input type="text" name="cfop2" value="5102">
            </div>
            <div class="grid">
                <input type="text" name="cod3" value="B34920">
                <input type="text" name="produto3" value="Barbante">
                <input type="text" name="un3" value="RL">
                <input type="number" name="qtd3" value="3">
                <input type="text" name="rsunit3" value="R$ 6,80">
                <input type="text" name="ncm3" value="88201475">
                <input type="text" name="cst3" value="201">
                <input type="text" name="cfop3" value="5102">
            </div>
            <div class="grid">
                <input type="text" name="cod4" value="98dg23">
                <input type="text" name="produto4" value="Cadernos">
                <input type="text" name="un4" value="UN">
                <input type="number" name="qtd4" value="8">
                <input type="text" name="rsunit4" value="R$ 7,30">
                <input type="text" name="ncm4" value="88521463">
                <input type="text" name="cst4" value="300">
                <input type="text" name="cfop4" value="5102">
            </div>
            <div class="grid">
                <input type="text" name="cod5" value="A20377">
                <input type="text" name="produto5" value="Caneta marca texto">
                <input type="text" name="un5" value="FD">
                <input type="number" name="qtd5" value="1">
                <input type="text" name="rsunit5" value="R$ 20,99">
                <input type="text" name="ncm5" value="88564198">
                <input type="text" name="cst5" value="200">
                <input type="text" name="cfop5" value="5102">
            </div>
            <div class="grid">
                <input type="text" name="cod6" value="A204556">
                <input type="text" name="produto6" value="Trigo">
                <input type="text" name="un6" value="KG">
                <input type="number" name="qtd6" value="2">
                <input type="text" name="rsunit6" value="R$ 3,50">
                <input type="text" name="ncm6" value="81325000">
                <input type="text" name="cst6" value="200">
                <input type="text" name="cfop6" value="5102">
            </div>
            <div class="grid">
                <textarea name="observacoes" rows="4" style="grid-column: span 9;"></textarea>
            </div>
            <div class="grid">
                <button type="submit" style="grid-column: span 9;">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>
