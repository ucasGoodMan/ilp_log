<?php
	$hostname = "127.0.0.1";
	$user = "root";
	$password = "root";
	$database = "senai";
		
	$conexao = new mysqli($hostname, $user, $password, $database);

	if ($conexao -> connect_errno) {
		echo "Failed to connect to MySQL: " . $conexao -> connect_error;
		exit();
	} else {
		// Evita caracteres especiais (SQL Inject)
		$nome = $conexao -> real_escape_string($_POST['nome']);
		$senha = $conexao -> real_escape_string($_POST['senhaa']);
		
		$sql="SELECT `nome` FROM `senai`.`alunos`
			WHERE `nome` = '".$nome."'
			AND `senha` = '".$senha."';";
            
		$resultado = $conexao->query($sql);
			
		if($resultado->num_rows != 0) {
			session_start();
			$row = $resultado -> fetch_array();
			$_SESSION['id'] = $row[0];
			$conexao -> close();
			
			header('Location: ../SENAI_LOGISTICA/home/index.php', true, 301);
			exit();
		} else {

			$conexao -> close();
			header('Location: index.php', true, 301);
		}
	}
?>