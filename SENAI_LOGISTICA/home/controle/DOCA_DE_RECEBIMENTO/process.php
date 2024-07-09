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
		$pedido = $conexao -> real_escape_string($_POST['pedido']);
		$doca = $conexao ->
		 real_escape_string($_POST['doca']);

    
        $sql="INSERT INTO `pedidosdoca`
			 (`pedido`, `doca`)
    VALUES
        ('".$pedido."', '".$doca."')";
            
			$resultado = $conexao->query($sql);
        
            $conexao -> close();
            header('Location: ../SENAI_LOGISTICA/home/controle/DOCA_DE_RECEBIMENTO/PedidosDaDoca.php', true, 301);
            }
        ?>

	
    
        

