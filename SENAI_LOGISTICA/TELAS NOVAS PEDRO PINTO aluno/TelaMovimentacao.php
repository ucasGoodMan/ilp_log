<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Operação de Movimentação</title>
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
            grid-template-columns: auto auto auto auto auto;
            gap: 10px;
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

        .produto-header, .produto-item {
            padding: 10px;
            border: 1px solid #ccc;
            background-color: white;
            text-align: center;
        }

        .produto-header {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .status-ok {
            background-color: rgb(37, 91, 168);
            color: white;
            text-align: center;
            cursor: pointer;
        }

        .status-ok:hover {
            background-color: rgb(29, 70, 130);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tela de Movimentação</h1>
        <form>
            <div class="grid">
                <div class="produto-header">Operações em Aberto</div>
                <div class="produto-header">UN</div>
                <div class="produto-header">QTD</div>
                <div class="produto-header">Posição</div>
                <div class="produto-header">Ação</div>

                <input class="produto-item" type="text" value="Barbante">
                <input class="produto-item" type="text" value="RL">
                <input class="produto-item" type="number" value="5">
                <input class="produto-item" type="text" value="A1">
                <button class="produto-item status-ok">Pegar</button>

                <input class="produto-item" type="text" value="Tesoura">
                <input class="produto-item" type="text" value="UN">
                <input class="produto-item" type="number" value="3">
                <input class="produto-item" type="text" value="B3">
                <button class="produto-item status-ok">Pegar</button>

                <input class="produto-item" type="text" value="Arame">
                <input class="produto-item" type="text" value="RL">
                <input class="produto-item" type="number" value="2">
                <input class="produto-item" type="text" value="A5">
                <button class="produto-item status-ok">Pegar</button>

                <input class="produto-item" type="text" value="Placa de indução">
                <input class="produto-item" type="text" value="PC">
                <input class="produto-item" type="number" value="4">
                <input class="produto-item" type="text" value="D1">
                <button class="produto-item status-ok">Pegar</button>

                <input class="produto-item" type="text" value="Fio de Nylon">
                <input class="produto-item" type="text" value="CX">
                <input class="produto-item" type="number" value="1">
                <input class="produto-item" type="text" value="C1">
                <button class="produto-item status-ok">Pegar</button>

                <input class="produto-item" type="text" value="Tesoura">
                <input class="produto-item" type="text" value="MT">
                <input class="produto-item" type="number" value="5">
                <input class="produto-item" type="text" value="C3">
                <button class="produto-item status-ok">Pegar</button>
            </div>
            <div style="margin-top: 20px; text-align: center;">
                <button type="submit">Operação de Movimentação</button>
            </div>
        </form>
    </div>
</body>
</html>
