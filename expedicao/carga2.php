<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tela 2 Vistoria e Conferência</title>
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

        <?php
        // Simulação de dados de solicitação
        $solicitacoes = [
            1 => [
                "produtos" => ["Produto A", "Produto B"],
                "quantidades" => [10, 20],
                "unidades" => ["Caixa", "Pacote"]
            ],
            2 => [
                "produtos" => ["Produto C", "Produto D"],
                "quantidades" => [5, 15],
                "unidades" => ["Metro", "Peça"]
            ]
            // Adicionar mais solicitações conforme necessário
        ];

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $numeroSolicitacao = '';
            for ($i = 1; $i <= 5; $i++) {
                $field = 'sltc' . $i;
                if (!empty($_POST[$field])) {
                    $numeroSolicitacao = $_POST[$field];
                    break;
                }
            }

            if (!empty($numeroSolicitacao) && isset($solicitacoes[$numeroSolicitacao])) {
                $dadosSolicitacao = $solicitacoes[$numeroSolicitacao];
                echo "<label>Solicitação Nº $numeroSolicitacao</label> 
                      <input type='text' value='" . htmlspecialchars($numeroSolicitacao) . "'><br><br>";

                echo "<div class='bloco'>";
                echo "Produtos da Solicitação<br>";
                foreach ($dadosSolicitacao["produtos"] as $produto) {
                    echo "<input type='text' value='" . htmlspecialchars($produto) . "' size='20'><br>";
                }
                echo "</div>";

                echo "<div class='bloco'>";
                echo "Tipo de Unidade<br>";
                foreach ($dadosSolicitacao["unidades"] as $unidade) {
                    echo "<input type='text' value='" . htmlspecialchars($unidade) . "' list='unidade'><br>";
                }
                echo "</div>";

                echo "<div class='bloco'>";
                echo "QTD<br>";
                foreach ($dadosSolicitacao["quantidades"] as $quantidade) {
                    echo "<input type='number' value='" . htmlspecialchars($quantidade) . "' list='quantidade'><br>";
                }
                echo "</div>";
            } else {
                echo "<label>Solicitação Nº $numeroSolicitacao não encontrada</label><br><br>";
            }
        }
        ?>

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
            </div>
            <div class='bloco'>
                QTD<br>
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
    </div>
    <script>
        function placeboClick(event) {
            event.preventDefault();
        }
    </script>
</body>
</html>
