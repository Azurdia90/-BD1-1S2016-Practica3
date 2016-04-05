<!DOCTYPE HTML>
<html>
	<head>
			<?php 	
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
			session_start();
			$conexion = new mysqli("localhost","Practicas_Bases","Practica34","Practicas_Bases1");
			if ($conexion->connect_errno) {
    			echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
			}
		?>	
		<title>Asignacion</title>
      	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
	</head>
	</head>
	<body>
		<!--INICIANDO EL BLOQUE DEL MENU-->
		<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="Area_Academica.php">Inicio</a></li>
					<li><a href="Asignacion.php">Asignaciones</a></li>
					<li><a href="Notas.php">Notas</a></li>
					<li><a href="Catedraticos.php">Catedraticos</a></li>
					<li><a href="Cerrar_Sesion.php">Cerrar Sesion</a></li>
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
		<!--FINALIZANDO EL BLOQUE DEL MENU-->
		<br/>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->
		<div id="formulario">
			<form action="CRUD_Asignacion.php" method="post">
				<label for="lb_curso">Curso</label>
				<input type="text" name="in_curso">
				<label for="lb_seccion">Seccion</label>
				<input type="text" name="in_seccion">
				<br/>
				<label for="lb_ciclo">Ciclo</label>
				<input type="text" name="in_ciclo">
				<br/>
				<input type="submit" value="Realizar">
			</form>
		</div>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->	
	</body>
</html>