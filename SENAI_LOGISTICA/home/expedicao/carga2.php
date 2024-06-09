<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela 2 - Vistoria e Conferência</title>
    <style>
        .bloco {
            width: 12%;
            text-align: center;
            display: inline-block;
        }
        .okdetudo {
            margin-left: 29.8%;
        }
        .doca {            margin-left: 13.7%;
            width: 5%;
        }
        .doca2 {
            margin-left: 4.1%;
        }
        .process {
            margin-left: 27.6%;
        }

    </style>
</head>
<body>
    <div class="Container">

        <center><label>RECARREGAR PÁGINA ACARRETARÁ EM PERDA DAS INFORMAÇÕES</label></center><br>

        <?php
        // Conexão com o banco de dados (substitua as credenciais conforme necessário)

        <center><label></label></center><br>

        <?php
        // Configurações do banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "usbw";
        $dbname = "senai";

        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Verificar se o ID da solicitação foi enviado via POST
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sltc1'])) {
            $id_solicitacao = $_POST['sltc1'];
            echo "ID da Solicitação: " . $id_solicitacao; // Adicionando echo para verificar o valor recebido

            // Consultar o banco de dados para obter os produtos relacionados a esta solicitação
            $sql_produtos = "SELECT * FROM produtos WHERE id = $id_solicitacao";
            $result_produtos = $conn->query($sql_produtos);

            if ($result_produtos->num_rows > 0) {
                echo "<label>Produtos da Solicitação Nº $id_solicitacao</label><br><br>";

                echo "<div class='bloco'>";
                while($row_produto = $result_produtos->fetch_assoc()) {
                    echo "<input type='text' value='" . htmlspecialchars($row_produto["nome"]) . "' size='20'><br>";


        // Criar conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $produtoID = '';
            for ($i = 1; $i <= 5; $i++) {
                $field = 'sltc' . $i;
                if (!empty($_POST[$field])) {
                    $produtoID = $_POST[$field];
                    break;
                }
            }

            if (!empty($produtoID)) {
                // Consultar o banco de dados
                $sql = "SELECT * FROM produtos WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("i", $produtoID);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo "<label>Produto ID $produtoID</label> 
                          <input type='text' value='" . htmlspecialchars($produtoID) . "'><br><br>";

                    echo "<div class='bloco'>";
                    echo "Nome do Produto<br>";
                    echo "<input type='text' value='" . htmlspecialchars($row["nome"]) . "' size='20'><br>";
                    echo "</div>";

                    echo "<div class='bloco'>";
                    echo "Tipo de Unidade<br>";
                    echo "<input type='text' value='" . htmlspecialchars($row["unidade"]) . "' list='unidade'><br>";
                    echo "</div>";

                    echo "<div class='bloco'>";
                    echo "QTD<br>";
                    echo "<input type='number' value='" . htmlspecialchars($row["quantidade"]) . "' list='quantidade'><br>";
                    echo "</div>";
                } else {
                    echo "<label>Produto ID $produtoID não encontrado</label><br><br>";

                }

                $stmt->close();
            } else {

                echo "Nenhum produto encontrado para esta solicitação.";
            }
        }

        $conn->close(); // Fechar conexão
        ?>

                echo "<label>ID do Produto não fornecido</label><br><br>";
            }
        }

        $conn->close();
        ?> 

        <form method="post" action="" id="form1" name="form1">
            <div class='bloco'>
                Produtos da Solicitação<br>
                <input type="text" placeholder='Insira aqui o ID do produto' name='sltc1' id='sltc1' size='20'><br>
                <input type="text" placeholder='Insira aqui o ID do produto' name='sltc2' id='sltc2' size='20'><br>
                <input type="text" placeholder='Insira aqui o ID do produto' name='sltc3' id='sltc3' size='20'><br>
                <input type="text" placeholder='Insira aqui o ID do produto' name='sltc4' id='sltc4' size='20'><br>
                <input type="text" placeholder='Insira aqui o ID do produto' name='sltc5' id='sltc5' size='20'><br>
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
</body>
</html>
 