<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	$usuario = $_POST["in_user"];
	$password = $_POST["in_pass"];
	$tipo = $_POST["sl_grupo"];
	$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
	if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}

	if(empty($usuario) && empty($password)){
		header("Location: index.php");
	}else{
		if (!($resultado = $conexion->query("CALL login($usuario,$password, @nombre, @apellido, @puesto, @area)"))) {
    		header("Location: index.php");
		}else{
			session_start();
			$_SESSION["id"] = $usuario;
			$resultado = $conexion->query("SELECT @nombre");
			$r_1 = $resultado->fetch_assoc();
			$_SESSION["lastname"] = $r_1["@nombre"];
			$resultado = $conexion->query("SELECT @apellido");
			$r_1 = $resultado->fetch_assoc();
			$_SESSION["firstname"]= $r_1["@apellido"];
			$resultado = $conexion->query("SELECT @puesto");
			$r_1 = $resultado->fetch_assoc();
			$_SESSION["issues"]= $r_1["@puesto"];
			$resultado = $conexion->query("SELECT @area");
			$r_1 = $resultado->fetch_assoc();
			$_SESSION["area"]= $r_1["@area"];
			if($tipo > 1){
				header("Location: Area_Administrativa.php");
			}else{
				header("Location: Area_Academica.php");
			}
		}	
	}		 
?>