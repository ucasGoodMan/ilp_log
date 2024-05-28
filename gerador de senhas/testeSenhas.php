<?php

function gerarSenha($tamanho = 4) {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $senha = '';
    for ($i = 0; $i < $tamanho; $i++) {
        $senha .= $caracteres[rand(0, strlen($caracteres) - 1)];
    }
    return $senha;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $novaSenha = gerarSenha();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gerador de Senhas</title>
</head> 
<body>
    <h2>Gerador de Senhas</h2>
    <form method="post">
        <button type="submit">Gerar Nova Senha</button>
    </form>
    <?php if(isset($novaSenha)): ?>
    <h3>Nova Senha: <?php echo $novaSenha; ?></h3>
    <?php endif; ?>
</body>
</html>
