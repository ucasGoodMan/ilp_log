<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela - Solicitação de Compra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 600px;
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

        .grid {
            display: grid;
            grid-template-columns: 1fr 2fr 1fr 1fr;
            gap: 10px;
            margin-bottom: 15px;
            align-items: center;
        }

        .label {
            background-color: #f0f0f0;
            color: #555;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
        }

        input[type="text"], input[type="number"], textarea, select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            width: 100%;
        }

        textarea {
            resize: none;
        }

        button {
            background-color: #255ba8;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #1e4b8e;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px; /* Adiciona espaço abaixo dos botões */
        }
    </style>
</head>
<body>
    <?php
    include "../../sidebarPROF.php";
    ?>
    <div class="container">
        <div class="header">
        <h1>Criação de Solicitação de Produto</h1>
        </div>
        <form action="process_request.php" method="post">
            <div class="grid">
                <div class="label">Solicitação Nº:</div>
                <input type="text" name="solicitacao" style="grid-column: span 3;">
            </div>
            <div class="grid">
                <div class="label">Produto</div>
                <div class="label">UN</div>
                <div class="label">QTD</div>
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
            <div class="button-container">
                <button type="button" onclick="addProductLine()">Adicionar Produto</button>
            </div>
            <div class="grid">
                <div class="label" style="grid-column: span 4;">Observações</div>
                <textarea name="observacoes" rows="4" style="grid-column: span 4;"></textarea>
            </div>
            <div class="button-container">
                <button type="submit">Enviar</button>
            </div>
        </form>
    </div>
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
</body>
</html>
