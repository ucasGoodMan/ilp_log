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
		$placa = $conexao -> real_escape_string($_POST['placa']);
		$cliente = $conexao -> real_escape_string($_POST['cliente']);
        $lacresif = $conexao -> real_escape_string($_POST['lacresif']);
		$nomemotori = $conexao -> real_escape_string($_POST['nomemotori']);
        $tipo = $conexao -> real_escape_string($_POST['tipo']);
		$onu = $conexao -> real_escape_string($_POST['onu']);
        $container = $conexao -> real_escape_string($_POST['container']);
        $lacre = $conexao -> real_escape_string($_POST['lacre']);
		$temp = $conexao -> real_escape_string($_POST['temp']);
        $navio = $conexao -> real_escape_string($_POST['navio']);
        $imo = $conexao -> real_escape_string($_POST['imo']);
		
        if(isset($_POST['ContainerDesgastado'])){
            $containerD = 1;
        } else {
            $containerD = 0;
        }

        if(isset($_POST['AvariaLateralDireita'])){
            $avariaLD = 1;
        } else {
            $avariaLD = 0;
        }

        if(isset($_POST['AvariaLateralEsquerda'])){
            $avariaLE = 1;
        } else {
            $avariaLE = 0;
        }

        if(isset($_POST['AvariaTeto'])){
            $avartiaT = 1;
        } else {
            $avariaT = 0;
        }

        if(isset($_POST['AvariaFrentre'])){
            $avariaF = 1;
        } else {
            $avariaF = 0;
        }

        if(isset($_POST['SemLacre'])){
            $semlacre = 1;
        } else {
            $semlacre = 0;
        }

        if(isset($_POST['AdesivoAvariado'])){
            $adesivoAV = 1;
        } else {
            $adesivoAV = 0;
        }

        if(isset($_POST['ExcessoAltura'])){
            $excessoALT = 1;
        } else {
            $excessoALT = 0;
        }

        if(isset($_POST['ExcessoDireita'])){
            $excessoD = 1;
        } else {
            $excessoD = 0;
        }

        if(isset($_POST['ExcessoEsquerda'])){
            $ExcessoE = 1;
        } else {
            $excessoE = 0;
        }

        if(isset($_POST['ExcessoFrontal'])){
            $excessoF = 1;
        } else {
            $excessoF = 0;
        }

        if(isset($_POST['PainelAvariado'])){
            $painelAV = 1;
        } else {
            $painelAV = 0;
        }

        if(isset($_POST['SemCaboEnergia'])){
            $semcaboE = 1;
        } else {
            $semcaboE = 0;
        }

        if(isset($_POST['SemLona'])){
            $semlona = 1;
        } else {
            $semlona = 0;
        }
        
        echo $_POST['SemLona'];

    $sql="INSERT INTO `vistoriaconferenciacontainer`
        (`PlacaCaminhao`, `NomeMotorista`, `Container`, `Navio`, `Cliente`,`Tipo`, `Lacre`, `LacreSif`, `Temperatura`, `IMO`, `NumeroOnu`, `ContainerDesgastado`, `AvariaLateralDireita`,`AvariaLateralEsquerda`, `AvariaTeto`, `AvariaFrentre`,`SemLacre`, `AdesivoAvariado`, `ExcessoAltura`, `ExcessoDireita`, `ExcessoEsquerda`, `ExcessoFrontal`, `PainelAvariado`, `SemCaboEnergia`, `SemLona`)
    VALUES
        ('".$placa."', '".$nomemotori."', '".$container."', '".$navio."','".$cliente."','".$tipo."', '".$lacre."', '".$lacresif."', '".$temp."', '".$imo."', '".$onu."', '".$containerD."', '".$avariaLD."', '".$avariaLE."', '".$avariaT."','".$avariaF."','".$semlacre."', '".$adesivoAV."', '".$excessoALT."', '".$excessoD."', '".$excessoE."', '".$excessoF."', '".$painelAV."', '".$semcaboE."', '".$semlona."')";
            
            $resultado = $conexao->query($sql);
        
            $conexao -> close();
            header('Location: ../Container/recebimento_container.php', true, 301);
            }
        ?>