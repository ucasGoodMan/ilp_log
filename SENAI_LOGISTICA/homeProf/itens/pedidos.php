<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>criação de pedido</title>
    <?php
    include '../../sidebarPROF.php';
    ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            border: 2px solid #ccc;
            border-radius: 5px;
            width: 900px;
        }

        h1 {
            text-align: center;
            color: black;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 3fr 1fr 1fr 1fr 2fr 1fr 1fr 1fr auto;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }

        .label {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }

        input[type="text"], input[type="number"], textarea, select, input[type="date"] {
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
    <script>
        let productCount = 1;

        function addProductLine() {
            const maxProducts = 10;
            const productLines = document.querySelectorAll('#products .grid').length;
            
            if (productLines < maxProducts) { 
                productCount++;
                
                const grid = document.createElement('div');
                grid.className = 'grid';
                grid.id = `product${productCount}`;

                grid.innerHTML = `
                    <input type="text" name="cod[]" placeholder="Código">
                    <input type="text" name="produto[]" placeholder="Produto">
                    <select name="un[]">
                        <option value="caixa">caixa</option>
                        <option value="unidade">unidade</option>
                        <option value="peça">peça</option>
                        <option value="kilograma">kilograma</option>
                        <option value="litro">litro</option>
                        <option value="palete">palete</option>
                        <option value="pacote">pacote</option>
                        <option value="cartão">cartão</option>
                        <option value="rolo">rolo</option>
                        <option value="tonelada">tonelada</option>
                        <option value="bloco">bloco</option>
                        <option value="saco">saco</option>
                        <option value="fardo">fardo</option>
                        <option value="bandeja">bandeja</option>
                    </select>
                    <input type="number" name="qtd[]" placeholder="Quantidade">
                    <input type="number" name="rsunit[]" placeholder="Preço Unitário">
                    <input type="text" name="ncm[]" placeholder="NCM">
                    <input type="text" name="cst[]" placeholder="CST">
                    <input type="text" name="cfop[]" placeholder="CFOP">
                    <button type="button" onclick="removeProductLine('product${productCount}')">Remover</button>
                `;

                document.getElementById('products').appendChild(grid);
            } 
        }

        function removeProductLine(id) {
            const productLine = document.getElementById(id);
            if (productLine) {
                productLine.remove();
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Pedido de Compra</h1>
        <form method="post" action="process.php">
            <div class="grid">
                <div class="label">Pedido Nº :</div>
                <input type="text" name="pedido" style="grid-column: span 3;">
                <div class="label" style="grid-column: span 3;">Data Entrega</div>
                <input type="date" name="data_entrega" style="grid-column: span 2;">
                <div class="label" style="grid-column: span 3;">Data Pedido</div>
                <input type="date" name="data_pedido" style="grid-column: span 2;">
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
            <div id="products">
                <div class="grid" id="product1">
                    <input id="npedido" type="number" name="cod[]" placeholder="Código">
                    <input id="produtos" type="text" name="produto[]" placeholder="Produto">
                    <select name="un[]">
                        <option value="caixa">caixa</option>
                        <option value="unidade">unidade</option>
                        <option value="peça">peça</option>
                        <option value="kilograma">kilograma</option>
                        <option value="litro">litro</option>
                        <option value="palete">palete</option>
                        <option value="pacote">pacote</option>
                        <option value="cartão">cartão</option>
                        <option value="rolo">rolo</option>
                        <option value="tonelada">tonelada</option>
                        <option value="bloco">bloco</option>
                        <option value="saco">saco</option>
                        <option value="fardo">fardo</option>
                        <option value="bandeja">bandeja</option>
                    </select>
                
                    <input id="quantidade" type="number" name="qtd[]" placeholder="Quantidade">
                    <input id="vlrporunidade" type="number" name="rsunit[]" placeholder="Preço">
                    <input id="ncm" type="number" name="ncm[]" placeholder="NCM">
                    <input id="cst" type="number" name="cst[]" placeholder="CST">
                    <input id="cfop" type="number" name="cfop[]" placeholder="CFOP">
                    <button type="button" onclick="removeProductLine('product1')">Remover</button>
                </div>
            </div>
            <div class="grid">
                <button type="button" onclick="addProductLine()" style="grid-column: span 10;">Adicionar Produto</button>
            </div>
            <div class="grid">
                <textarea name="observacoes" rows="4" style="grid-column: span 10;"></textarea>
            </div>
            <div class="grid">
                <button type="submit" style="grid-column: span 10;">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>
