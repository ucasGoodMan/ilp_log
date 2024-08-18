<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Pedido</title>
    <?php
    include '../../sidebarPROF.php';
    ?>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            width: 100%;
            max-width: 1000px;
            margin: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid rgb(37, 91, 168);
            padding-bottom: 10px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: rgb(37, 91, 168);
            font-size: 28px;
            margin: 0;
        }

        .form-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group .label {
            flex: 1;
            min-width: 150px;
            font-weight: bold;
            color: black;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea,
        .form-group select,
        .form-group input[type="date"] {
            flex: 2;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }

        textarea {
            resize: none;
        }

        .products-header {
            display: grid;
            grid-template-columns: repeat(9, 1fr);
            font-weight: bold;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            color: black;
            margin-bottom: 20px;
            padding: 5px;
            border-radius: 5px;
            text-align: center;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(9, 1fr);
            gap: 10px;
            margin-bottom: 15px;
        }

        .products-grid input[type="text"],
        .products-grid input[type="number"],
        .products-grid select {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #2d72b7;
        }

        .add-button {
            margin-top: 15px;
        }
    </style>
    <script>
        let productCount = 1;

        function addProductLine() {
            const maxProducts = 10;
            const productLines = document.querySelectorAll('#products .products-grid').length;

            if (productLines < maxProducts) {
                productCount++;

                const grid = document.createElement('div');
                grid.className = 'products-grid';
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
        <div class="header">
        <h1>Pedido de Compra</h1>
        </div>
        <form method="post" action="process.php">
            <div class="form-group">
                <label class="label" for="pedido">Pedido Nº:</label>
                <input type="text" id="pedido" placeholder="Digite o número" name="pedido">
            </div>
            <div class="form-group">
                <label class="label" for="data_pedido">Data Pedido:</label>
                <input type="date" id="data_pedido" name="data_pedido">
            </div>
            <div class="form-group">
                <label class="label" for="data_entrega">Data Entrega:</label>
                <input type="date" id="data_entrega" name="data_entrega">
            </div>

            <div class="products-header">
                <div>COD. PROD (SKU)</div>
                <div>Produto</div>
                <div>UN</div>
                <div>Quantidade</div>
                <div>R$/unit</div>
                <div>NCM</div>
                <div>CST</div>
                <div>CFOP</div>
                <div>Ação</div>
            </div>
            <div id="products">
                <div class="products-grid" id="product1">
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
            <button class="add-button" type="button" onclick="addProductLine()">Adicionar Produto</button>
            <div class="form-group">
                <
