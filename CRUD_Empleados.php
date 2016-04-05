<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
	if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}

	$key_employed = $_POST["in_key_employed2"];
	$pos_employed = $_POST["in_puesto"];
	$name_employed = $_POST["in_firstnam_employed"];
	$last_employed = $_POST["in_lastnam_employed"];
	$birth_employed = $_POST["in_birth_date"];
	$start_employed = $_POST["in_start_date"];
	$unit_employed = $_POST["in_unidad"];
	$operation = $_POST["sl_cur"];
	
	if($operation  == 1){
		if (!($resultado = $conexion->query('CALL CreateEmpleado('.$key_employed.',"'.$last_employed.'","'.$name_employed.'","'.$birth_employed.'","'.$start_employed.'","'.$pos_employed.'","'.$unit_employed.'")'))) {
    		echo "Falló la creación del empleado: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Empleadoss.php");
		}
	}elseif($operation == 2 && !empty($key_employed)){
		if (!($resultado = $conexion->query('CALL UpdateEmpleado('.$key_employed.',"'.$last_employed.'","'.$name_employed.'","'.$birth_employed.'","'.$start_employed.'","'.$pos_employed.'","'.$unit_employed.'")'))) {
    		echo "Falló la modificacion del empleado: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Empleados.php");
		}	
	}elseif($operation == 3 && !empty($key_employed)){
		if (!($resultado = $conexion->query("CALL DeleteEmpleado($key_employed)"))) {
    		echo "Falló la eliminacion del empleado: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Empleados.php");
		}
	}else{
		header("Location: Empleados.php");
	}			 

?>