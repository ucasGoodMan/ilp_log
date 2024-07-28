<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Produtos</title>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(8, 1fr) auto;
            gap: 10px;
            margin-bottom: 10px;
            align-items: center;
        }
    </style>
    <script>
        let productCount = 1;

        function addProductLine() {
            productCount++;

            const grid = document.createElement('div');
            grid.className = 'grid';
            grid.id = `product${productCount}`;

            grid.innerHTML = `
                <input type="text" name="cod${productCount}" placeholder="Código">
                <input type="text" name="produto${productCount}" placeholder="Produto">
                <input type="text" name="un${productCount}" placeholder="UN">
                <input type="number" name="qtd${productCount}" placeholder="Quantidade">
                <input type="text" name="rsunit${productCount}" placeholder="Preço Unitário">
                <input type="text" name="ncm${productCount}" placeholder="NCM">
                <input type="text" name="cst${productCount}" placeholder="CST">
                <input type="text" name="cfop${productCount}" placeholder="CFOP">
                <button type="button" onclick="removeProductLine('product${productCount}')">Remover</button>
            `;

            document.getElementById('products').appendChild(grid);
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
    <form action="submit_order.php" method="post">
        <div id="products">
            <div class="grid" id="product1">
                <input type="text" name="cod1" value="A56fe0">
                <input type="text" name="produto1" value="Tesoura">
                <input type="text" name="un1" value="UN">
                <input type="number" name="qtd1" value="5">
                <input type="text" name="rsunit1" value="R$ 5,50">
                <input type="text" name="ncm1" value="88214596">
                <input type="text" name="cst1" value="200">
                <input type="text" name="cfop1" value="5102">
                <button type="button" onclick="removeProductLine('product1')">Remover</button>
            </div>
        </div>
        <button type="button" onclick="addProductLine()">Adicionar Produto</button>
        <button type="submit">Enviar Pedido</button>
    </form>
</body>
</html>




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