<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela 1 - do Picking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border: 2px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: rgb(37, 91, 168);
            margin-bottom: 20px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 20px;
        }

        .row {
            display: contents;
        }

        .label {
            display: flex;
            align-items: center;
            justify-content: center;
            color: black;
            padding: 10px;
            border-radius: 4px;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: rgb(56, 130, 235);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>PRECISAMOS CONVERSAR SOBRE ESSA TELA</h1>
        <h1>Tela 1 - do Picking</h1>
        <div class="grid">
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text">
                <button>Abrir</button>
            </div>
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text">
                <button>Abrir</button>
            </div>
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text">
                <button>Abrir</button>
            </div>
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text">
                <button>Abrir</button>
            </div>
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text">
                <button>Abrir</button>
            </div>
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text">
                <button>Abrir</button>
            </div>
        </div>
    </div>
</body>
</html>
