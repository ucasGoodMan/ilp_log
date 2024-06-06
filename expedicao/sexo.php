<?php
        // Obtém o valor do campo de texto
        $texto = htmlspecialchars($_POST['texto']);
        
        // Faz alguma coisa com o dado (ex: exibe na tela, armazena no banco de dados, etc.)
        echo "Você digitou: " . $texto;
?>
