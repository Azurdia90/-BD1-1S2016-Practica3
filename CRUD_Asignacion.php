<?php
	
	error_reporting(E_ALL);
	ini_set('display_errors', '1');
	session_start();
	$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
	if ($conexion->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
	}

	$curso = $_POST["in_curso"];
	$seccion = $_POST["in_seccion"];
	$ciclo = $_POST["in_ciclo"];

	if (!($resultado = $conexion->query('CALL asignacion("'.$curso.'","'.$seccion.'","'.$ciclo.'","'.$_SESSION["id"].'")'))) {
    		echo "Falló la asignacion: (" . $conexion->errno . ") " . $conexion->error;
		}else{
			header("Location: Asignacion.php");
	}		 

?>