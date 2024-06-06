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
		$pedido1 = $conexao -> real_escape_string($_POST['pedido1']);
		$doca1 = $conexao -> real_escape_string($_POST['doca1']);

        $pedido2 = $conexao -> real_escape_string($_POST['pedido2']);
		$doca2 = $conexao -> real_escape_string($_POST['doca2']);

        $pedido3 = $conexao -> real_escape_string($_POST['pedido3']);
		$doca3 = $conexao -> real_escape_string($_POST['doca3']);

        $pedido4 = $conexao -> real_escape_string($_POST['pedido4']);
		$doca4 = $conexao -> real_escape_string($_POST['doca4']);

        $pedido5 = $conexao -> real_escape_string($_POST['pedido5']);
		$doca5 = $conexao -> real_escape_string($_POST['doca5']);
    }
        

