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
    </style>
</head>
<body>
    <div class="Container">
        <center><label>RECARREGAR PÁGINA ACARRETARÁ EM PERDA DAS INFORMAÇÕES</label></center><br>

        <?php
        // Conexão com o banco de dados (substitua as credenciais conforme necessário)
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
                }
                echo "</div>";
            } else {
                echo "Nenhum produto encontrado para esta solicitação.";
            }
        }

        $conn->close(); // Fechar conexão
        ?>
    </div>
</body>
</html>
