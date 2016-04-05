<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');

	$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
	if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}

	$codigo = $_POST["in_key_curso2"];
	$nombre = $_POST["in_nombre"];
	$carrera = $_POST["in_carrera"];
	$salon = $_POST["in_salon"];
	$catedratico = $_POST["in_catedratico"];
	$lab = $_POST["in_lab"];
	$cupo = $_POST["in_cupo"];
	$horario = $_POST["in_horario"];
	$cod_unidad = $_POST["in_unidad"];
	$cod_seccion = $_POST["in_seccion"];
	$operation = $_POST["sl_cur"]; 
	
	if($operation  == 1){
		if (!($resultado = $conexion->query('CALL CreateCurso("'.$nombre.'","'.$carrera.'","'.$salon.'","'.$catedratico.'","'.$lab.'","'.$cupo.'","'.$horario.'","'.$cod_unidad.'","'.$cod_seccion.'")'))) {
    		echo "Falló la creación del empleado: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Cursos.php");
		}
	}elseif($operation == 2 && !empty($codigo)){
		if (!($resultado = $conexion->query('CALL UpdateCurso("'.$codigo.'","'.$nombre.'","'.$carrera.'","'.$salon.'","'.$catedratico.'","'.$lab.'","'.$cupo.'","'.$horario.'","'.$cod_unidad.'","'.$cod_seccion.'")'))) {
    		echo "Falló la modificacion del empleado: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Cursos.php");
		}	
	}elseif($operation == 3 && !empty($codigo)){
		if (!($resultado = $conexion->query('CALL DeleteCurso("'.$codigo.'")'))) {
    		echo "Falló la eliminacion del empleado: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Cursos.php");
		}
	}else{
		header("Location: Cursos.php");
	}			 

?>