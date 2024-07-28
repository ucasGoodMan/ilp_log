<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela 2 - Vistoria e conferência - Carga</title>
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
        }

        h1 {
            text-align: center;
            color: black;
        }

        .grid {
            display: grid;
            grid-template-columns: auto auto auto auto auto auto;
            gap: 10px;
            align-items: center;
        }

        .label {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            color: black;
            padding: 10px;
            border: 1px solid #ccc;
        }

        input[type="text"], input[type="number"] {
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
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

        .produto-grid {
            display: grid;
            grid-template-columns: auto auto auto auto auto;
            gap: 5px;
            margin-top: 10px;
        }

        .produto-header, .produto-item {
            padding: 10px;
            border: 1px solid #ccc;
            background-color: white;
        }

        .produto-header {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
        }

        .status-ok {
            background-color: rgb(37, 168, 91);
            color: white;
            text-align: center;
            border: none;
            cursor: pointer;
            padding: 10px;
        }

        .observacao {
            padding: 10px;
            border: 1px solid #ccc;
            background-color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tela 2 - Vistoria e conferência - Carga</h1>
        <form>
            <div class="grid">
                <div class="label">Solicitação nº</div>
                <input type="text" name="solicitacao" style="grid-column: span 5;">
            </div>
            <div class="produto-grid">
                <div class="produto-header">Produtos da Solicitação</div>
                <div class="produto-header">UN</div>
                <div class="produto-header">QTD</div>
                <div class="produto-header">Status</div>
                <div class="produto-header">Observações</div>

                <input type="text" name="produto1" value="Barbante" class="produto-item">
                <input type="text" name="un1" value="RL" class="produto-item">
                <input type="text" name="qtd1" value="5" class="produto-item">
                <button type="button" class="status-ok">OK</button>
                <input type="text" name="obs1" class="produto-item">

                <input type="text" name="produto2" value="Tesoura" class="produto-item">
                <input type="text" name="un2" value="UN" class="produto-item">
                <input type="text" name="qtd2" value="3" class="produto-item">
                <button type="button" class="status-ok">OK</button>
                <input type="text" name="obs2" class="produto-item">

                <input type="text" name="produto3" value="Arame" class="produto-item">
                <input type="text" name="un3" value="RL" class="produto-item">
                <input type="text" name="qtd3" value="2" class="produto-item">
                <button type="button" class="status-ok">OK</button>
                <input type="text" name="obs3" class="produto-item">

                <input type="text" name="produto4" value="Placa de indução" class="produto-item">
                <input type="text" name="un4" value="PQ" class="produto-item">
                <input type="text" name="qtd4" value="4" class="produto-item">
                <button type="button" class="status-ok">OK</button>
                <input type="text" name="obs4" class="produto-item">

                <input type="text" name="produto5" value="Fio de Nylon" class="produto-item">
                <input type="text" name="un5" value="CX" class="produto-item">
                <input type="text" name="qtd5" value="1" class="produto-item">
                <button type="button" class="status-ok">OK</button>
                <input type="text" name="obs5" class="produto-item">

                <input type="text" name="produto6" value="Tesoura" class="produto-item">
                <input type="text" name="un6" value="MT" class="produto-item">
                <input type="text" name="qtd6" value="5" class="produto-item">
                <button type="button" class="status-ok">OK</button>
                <button type="button" class="status-ok">OK de tudo</button>
            </div>
            <div class="grid" style="margin-top: 20px;">
                <div class="label" style="grid-column: span 2;">Confirmação de saída na doca >>></div>
                <div class="label">Doca:</div>
                <input type="number" name="doca" style="grid-column: span 2;">
                <button type="submit" style="grid-column: span 2;">Pedido OK Carregado</button>
            </div>
        </form>
    </div>
</body>
</html>
