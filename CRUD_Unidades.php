<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
	if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}

	$key_unit = $_POST["in_key_unidad2"];
	$type_unit = $_POST["in_tipo_unidad"];
	$name_unit = $_POST["in_nam_unidad"];
	$build_unit = $_POST["in_build"];
	$date_unit = $_POST["in_date_fundation"];
	$chief_unit = $_POST["in_encargado"];
	$open_unit = $_POST["in_hour_begin"];
	$close_unit = $_POST["in_hour_finish"];
	$operation = $_POST["sl_cur"];
	echo $type_unit;
	if($operation  == 1){
		if (!($resultado = $conexion->query('CALL CreateUnidad("'.$name_unit.'","'.$chief_unit.'","'.$date_unit.'","'.$open_unit.'","'.$close_unit.'","'.$type_unit.'","'.$build_unit.'")'))) {
    		echo "Falló la creación de la Unidad: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Unidades.php");
		}
	}elseif($operation == 2 && !empty($key_unit)){
		if (!($resultado = $conexion->query('CALL UpdateUnidad("'.$key_unit.'","'.$name_unit.'","'.$chief_unit.'","'.$date_unit.'","'.$open_unit.'","'.$close_unit.'","'.$type_unit.'","'.$build_unit.'")'))) {
    		echo "Falló la modificacion de la Unidad: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Unidades.php");
		}	
	}elseif($operation == 3 && !empty($key_unit)){
		if (!($resultado = $conexion->query("CALL DeleteUnidad($key_unit)"))) {
    		echo "Falló la eliminacion de la Unidad: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Unidades.php");
		}
	}else{
		header("Location: Unidades.php");
	}			 

?>