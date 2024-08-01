<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela 1 - Expedição/Separação</title>
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
            grid-template-columns: auto auto auto;
            gap: 10px;
        }

        .row {
            display: contents;
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

        input[type="text"] {
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Tela 1 - Expedição</h1>
        <form class="grid" method="POST" action="abre_pedidos_especificados.php">
            <div class="row">
                <span class="label">Solicitação nº</span>
                <input type="text" name="solicitacao">
                <button type="submit">Abrir</button>
            </div>
            <!-- Adicione mais campos de solicitação conforme necessário -->
        </form>
    </div>
</body>
</html>
