<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Container</title>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .divContainer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            width: 900px;
            padding: 40px;
            background: #ffffff;
            box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
            border-radius: 12px;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: rgb(37, 91, 168);
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        .back-button:hover {
            background-color: rgb(31, 81, 148);
        }

        .back-button i {
            margin-right: 5px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .bloco, .blocoB, .blocoC {
            flex: 1 1 30%;
            box-sizing: border-box;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="number"], input[type="submit"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px; /* Espaçamento entre os inputs */
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.1);
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: rgb(37, 91, 168);
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            margin-top: 20px;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #2d72b7;
        }

        .checklist-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .checklist {
            flex: 1 1 30%;
        }

        .checklist label {
            display: flex;
            align-items: center;
            font-weight: normal;
            margin-bottom: 0px; /* Espaçamento entre checkboxes */
            cursor: pointer;
        }

        .checklist input[type="checkbox"] {
            appearance: none;
            width: 20px;
            height: 20px;
            border: 2px solid #ddd;
            border-radius: 4px;
            outline: none;
            cursor: pointer;
            position: relative;
            background-color: #fff;
            transition: background-color 0.3s, border-color 0.3s;
            margin-right: 10px; /* Espaçamento entre checkbox e texto */
        }

        .checklist input[type="checkbox"]:checked {
            background-color: rgb(37, 91, 168);
            border-color: rgb(37, 91, 168);
        }

        .checklist input[type="checkbox"]:checked::before {
            content: '✔';
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }

        .checklist input[type="checkbox"]:disabled {
            background-color: #f5f5f5;
            cursor: not-allowed;
        }

        .checklist input[type="checkbox"]:disabled:checked {
            background-color: #b0bec5;
        }
        h1 {
                color: rgb(37, 91, 168);
                text-align: center;
                margin-bottom: 30px;
                font-size: 28px;
            }
    </style>
</head>
<body> 
    <?php 
    include "../../../sidebarALU.php";
    ?>
    <div class="divContainer">
    <h1>Recebimento container</h1>
        <form method="post" action="process.php" id="form1" name="form1">
            <div class="container">
                <div class="bloco">
                    <label for="placa">Placa do caminhão:</label>
                    <input type="text" name="placa" id="placa">
                </div>
                
                <div class="blocoB">
                    <label for="cliente">Cliente:</label>
                    <input type="text" name="cliente" id="cliente">
                </div>
                
                <div class="bloco">
                    <label for="lacresif">Lacre SIF:</label>
                    <input type="number" name="lacresif" id="lacresif">
                </div>
                
                <div class="blocoB">
                    <label for="nomemotori">Nome do Motorista:</label>
                    <input type="text" name="nomemotori" id="nomemotori">
                </div>
                    
                <div class="bloco">
                    <label for="tipo">Tipo:</label>
                    <input type="text" name="tipo" id="tipo">
                </div>
                
                <div class="blocoB">
                    <label for="onu">Nº ONU:</label>
                    <input type="number" name="onu" id="onu">
                </div> 
                
                <div class="bloco">
                    <label for="container">Container:</label>
                    <input type="text" name="container" id="container">
                </div>
                
                <div class="blocoB">
                    <label for="lacre">Lacre:</label>
                    <input type="text" name="lacre" id="lacre">
                </div>
                
                <div class="bloco">
                    <label for="temp">Temperatura:</label>
                    <input type="number" name="temp" id="temp">
                </div>
                    
                <div class="blocoC">
                    <label for="navio">Navio:</label>
                    <input type="text" name="navio" id="navio">
                </div>

                <div class="blocoB">
                    <label for="imo">IMO:</label>
                    <input type="number" name="imo" id="imo">
                </div>
            </div>
            
            <div class="checklist-container">
                <div class="checklist">
                    <label><input type="checkbox" name="ContainerDesgastado" value="0"> Container Bem Desgastado</label><br>
                    <label><input type="checkbox" name="AvariaLateralDireita" value="0"> Avaria Lateral Direita</label><br>
                    <label><input type="checkbox" name="AvariaLateralEsquerda" value="0"> Avaria Lateral Esquerda</label><br>
                    <label><input type="checkbox" name="AvariaTeto" value="0"> Avaria Teto</label><br>
                    <label><input type="checkbox" name="AvariaFrentre" value="0"> Avaria Frente</label>
                </div>
                <div class="checklist">
                    <label><input type="checkbox" name="SemLacre" value="0"> Sem Lacre</label><br>
                    <label><input type="checkbox" name="AdesivoAvariado" value="0"> Adesivos Avariados</label><br>
                    <label><input type="checkbox" name="ExcessoAltura" value="0"> Excesso de Altura</label><br>
                    <label><input type="checkbox" name="ExcessoDireita" value="0"> Excesso Direita</label><br>
                    <label><input type="checkbox" name="ExcessoEsquerda" value="0"> Excesso Esquerda</label>
                </div>
                <div class="checklist">
                    <label><input type="checkbox" name="ExcessoFrontal" value="0"> Excesso Frontal</label><br>
                    <label><input type="checkbox" name="PainelAvariado" value="0"> Painel Avariado</label><br>
                    <label><input type="checkbox" name="DesgastePiso" value="0"> Desgaste no Piso</label><br>
                    <label><input type="checkbox" name="FerrugemExcessiva" value="0"> Ferrugem Excessiva</label><br>
                    <label><input type="checkbox" name="Outros" value="0"> Outros</label>
                </div>
            </div>
            
            <input type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
