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
		$produto = $conexao -> real_escape_string($_POST['placa']);
		$tipopro = $conexao -> real_escape_string($_POST['cliente']);
        $quantidade = $conexao -> real_escape_string($_POST['lacresif']);
		$quantidade2 = $conexao -> real_escape_string($_POST['nomemotori']);
        $tipo = $conexao -> real_escape_string($_POST['tipo']);
		$onu = $conexao -> real_escape_string($_POST['onu']);
        $container = $conexao -> real_escape_string($_POST['container']);
       

    $sql="INSERT INTO `designarprodutos`
        (`PlacaCaminhao`, `NomeMotorista`, `Container`, `Navio`, `Cliente`,`Tipo`, `Lacre`, `LacreSif`, `Temperatura`, `IMO`, `NumeroOnu`, `ContainerDesgastado`, `AvariaLateralDireita`,`AvariaLateralEsquerda`, `AvariaTeto`, `AvariaFrentre`,`SemLacre`, `AdesivoAvariado`, `ExcessoAltura`, `ExcessoDireita`, `ExcessoEsquerda`, `ExcessoFrontal`, `PainelAvariado`, `SemCaboEnergia`, `SemLona`)
    VALUES
        ('".$placa."', '".$nomemotori."', '".$container."', '".$navio."','".$cliente."','".$tipo."', '".$lacre."', '".$lacresif."', '".$temp."', '".$imo."', '".$onu."', '".$containerD."', '".$avariaLD."', '".$avariaLE."', '".$avariaT."','".$avariaF."','".$semlacre."', '".$adesivoAV."', '".$excessoALT."', '".$excessoD."', '".$excessoE."', '".$excessoF."', '".$painelAV."', '".$semcaboE."', '".$semlona."')";
            
            $resultado = $conexao->query($sql);
        
            $conexao -> close();
            header('Location: ../Container/recebimento_container.php', true, 301);
            }
        ?>