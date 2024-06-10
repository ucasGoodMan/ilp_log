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
		$item = $conexao -> real_escape_string($_POST['item']);
		$unidade = $conexao -> real_escape_string($_POST['unidade']);
        $quantidade = $conexao -> real_escape_string($_POST['quantidade']);
		$posicao = $conexao -> real_escape_string($_POST['posicao']); 
		
		$sql="SELECT `item` FROM `senai`.`alunos`
			WHERE `user` = '".$email."'
			AND `senha` = '".hash('sha256',$senha)."';";
            
		$resultado = $conexao->query($sql);
			
		if($resultado->num_rows != 0) {
			session_start();
			$row = $resultado -> fetch_array();
			
			$_SESSION['id'] = $row[0];
			$conexao -> close();
			
			header('Location: ../SENAI_LOGISTICA/home/site.php', true, 301);
			exit();
		} else {

			$conexao -> close();
			header('Location: index.php', true, 301);
		}
	}
?>