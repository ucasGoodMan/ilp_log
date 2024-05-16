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
		
    $sql="SELECT `id` FROM `turma_id`";
        
        $id = $idn["id"];
        $idn = $id+1;

    $sql="INSERT INTO `turma_id`
        (`id`)

    VALUES
        ('".$id."');";
			$resultado = $conexao->query($sql);
       
            $conexao -> close();
            header('Location: ../homeProf/alunos/turmas.php', true, 301);
            }
	?>