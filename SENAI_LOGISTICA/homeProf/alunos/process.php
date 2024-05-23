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
		$id = $conexao -> real_escape_string($_POST['id']);
		$nometurma = $conexao -> real_escape_string($_POST['nometurma']);
        $qntalunos = $conexao -> real_escape_string($_POST['qntalunos']);
		
    $sql="INSERT INTO `turma`
        (`id`, `nometurma`, `qntalunos`)
    VALUES
        ('".$id."', '".$nometurma."', '".$qntalunos."')";
            
            $resultado = $conexao->query($sql);
        
            $conexao -> close();
            header('Location: ../alunos/turmas.php', true, 301);
            }
        ?>  