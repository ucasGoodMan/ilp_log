<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela - Solicitação de Compra</title>
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
            width: 600px;
        }

        h1 {
            text-align: center;
            color: black;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 4fr 1fr 1fr;
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

        input[type="text"], input[type="number"], textarea, select {
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
                    <input type="text" name="produto${productCount}" placeholder="Produto">
                    <select name="un${productCount}">
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
                    <input type="number" name="qtd${productCount}" placeholder="Quantidade">
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
        <h1>Criação de solicitação de produto - simulação</h1>
        <form action="process_request.php" method="post">
            <div class="grid">
                <div class="label">Solicitação Nº :</div>
                <input type="text" name="solicitacao" style="grid-column: span 3;">
            </div>
            <div class="grid">
                <div class="label" style="grid-column: 1 / span 1;">Produtos</div>
                <div class="label" style="grid-column: 3 / span 1;">UN</div>
                <div class="label" style="grid-column: 4 / span 1;">QTD</div>
            </div>
            <div id="products">
                <div class="grid" id="product1">
                    <input type="text" name="produto1" placeholder="Produto">
                    <select name="un1">
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
                    <input type="number" name="qtd1" placeholder="Quantidade">
                    <button type="button" onclick="removeProductLine('product1')">Remover</button>
                </div>
            </div>
            <button type="button" onclick="addProductLine()" style="grid-column: span 4;">Adicionar Produto</button>
            <div class="grid">
                <div class="label" style="grid-column: span 4;">Observações</div>
                <textarea name="observacoes" rows="4" style="grid-column: span 4;"></textarea>
            </div>
            <div class="grid">
                <button type="submit" style="grid-column: span 4;">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>