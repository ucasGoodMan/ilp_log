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
	
		$nometurma = $conexao -> real_escape_string($_POST['nometurma']);
        $qntalunos = $conexao -> real_escape_string($_POST['qntalunos']);

		
		$sql = "INSERT INTO `turma`
			 (`nometurma`, `qntalunos`) 
			 VALUES 
			 ('".$nometurma."', '".$qntalunos."')";
			 
		
		$sql = "INSERT INTO `turma`
		(`nometurma`, `qntalunos`) 
		VALUES 
		('".$nometurma."', '".$qntalunos."')";

		   $resultado = $conexao->query($sql);
			   
		   $conexao -> close();
		   header('Location: ../alunos/turmas.php', true, 301);
		   }
?>






