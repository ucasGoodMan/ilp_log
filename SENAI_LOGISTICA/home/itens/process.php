<?php
	$hostname = "127.0.0.1";
	$user = "root";
	$password = "usbw";
	$database = "senai";
		 
	$conexao = new mysqli($hostname, $user, $password, $database);

	if ($conexao -> connect_errno) {
		echo "Failed to connect to MySQL: " . $conexao -> connect_error;
		exit();
	} else {
		// Evita caracteres especiais (SQL Inject)
		$npedido = $conexao -> real_escape_string($_POST['npedido']);
		$produto = $conexao -> real_escape_string($_POST['produtos']);
		$unidade = $conexao -> real_escape_string($_POST['unidade']);
        $quantidade = $conexao -> real_escape_string($_POST['quantidade']);
		$vlrporunidade = $conexao -> real_escape_string($_POST['vlrporunidade']);
        $ncm = $conexao -> real_escape_string($_POST['ncm']);
		$cst = $conexao -> real_escape_string($_POST['cst']);
        $cfop = $conexao -> real_escape_string($_POST['cfop']);
		$doca = $conexao -> real_escape_string($_POST['doca']); 

    $sql="INSERT INTO `criacaopedido`
        (`npedido`,  `produtos`, `unidade`, `quantidade`, `vlrporunidade`, `ncm`,`cst`, `cfop`, `doca`)
    VALUES
        ('".$npedido."', '".$produto."', '".$unidade."', '".$quantidade."', '".$vlrporunidade."','".$ncm."','".$cst."', '".$cfop."', '".$doca."');";

			$resultado = $conexao->query($sql);
       
            $conexao -> close();
            header('Location: ../itens/pedidos.php', true, 301);
            }
	?>