<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
	if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}

	$cod = $_POST["in_key_puesto2"];
	$nombre = $_POST["in_nombre"];
	$descripcion = $_POST["in_descripcion"];
	$acceso = $_POST["in_acceso"];
	$operation = $_POST["sl_cur"];

	if($operation  == 1){
		if (!($resultado = $conexion->query('CALL CreatePuesto("'.$nombre.'","'.$descripcion.'","'.$acceso.'")'))) {
    		echo "Falló la creación del PUesto: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Puestos.php");
		}
	}elseif($operation == 2 && !empty($cod)){
		if (!($resultado = $conexion->query('CALL UpdatePuesto("'.$cod.'","'.$nombre.'","'.$descripcion.'","'.$acceso.'")'))) {
    		echo "Falló la modificacion del Puesto: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Puestos.php");
		}	
	}elseif($operation == 3 && !empty($cod)){
		if (!($resultado = $conexion->query('CALL DeletePuesto("'.$cod.'")'))) {
    		echo "Falló la eliminacion del PUesto: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Puestos.php");
		}
	}else{
		header("Location: Puestos.php");
	}			 

?>