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
		<title>Puestos</title>
      	<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="Style/estilo1.css">
	</head>
	</head>
	<body>
		<!--INICIANDO EL BLOQUE DEL MENU-->
		<div id="header">
			<nav> <!-- Aqui estamos iniciando la nueva etiqueta nav -->
				<ul class="nav">
					<li><a href="Area_Administrativa.php">Inicio</a></li>
					<li><a href="Unidades.php">Unidades Administrativas</a></li>
					<li><a href="Empleados.php">Empleados</a></li>
					<li><a href="Puestos.php">Puestos</a></li>
					<li><a href="Cursos.php">Cursos</a></li>
					<li><a href="Cerrar_Sesion.php">Cerrar Sesion</a></li>
				</ul>
			</nav><!-- Aqui estamos cerrando la nueva etiqueta nav -->
		</div>
		<!--FINALIZANDO EL BLOQUE DEL MENU-->
		<br/>
		<!--INICIANDO EL BLOQUE DE BUSQUEDA-->
		<div id= "area_busqueda">
			<form action="Puestos.php" method="post">
				<label for="lb_buscar">Codigo Puesto</label>
				<input type="text" name="in_key_puesto">
				<input type="submit" value="Buscar">
			</form>
		</div>
		<!--FINALINZADO EL BLOQUE DE BUSQUEDA-->
		<br/>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->
		<div id="formulario">
			<form action="CRUD_Puestos.php" method="post">
				<?php
					if($_POST){
						$cod = $_POST["in_key_puesto"];
						if (!($resultado = $conexion->query("CALL ReadPuesto($cod, @nombre, @descripcion, @acceso)"))) {
    						header("Location: Puestos.php");
						}else{
							$resultado = $conexion->query("SELECT @nombre");
							$r_name = $resultado->fetch_assoc();
							$nombre = $r_name["@nombre"];
							$resultado = $conexion->query("SELECT @descripcion");
							$r_descripcion = $resultado->fetch_assoc();
							$descripcion = $r_descripcion["@descripcion"];
							$resultado = $conexion->query("SELECT @acceso");
							$r_acceso = $resultado->fetch_assoc();
							$acceso = $r_acceso["@acceso"];		
				?>	
				<label for="lb_codigo">Codigo Puesto</label>
				<input type="text" name="in_key_puesto2" value="<?= $cod?>">
				<label for="lb_nombre">Puesto</label>
				<input type="text" name="in_nombre" value="<?= $nombre?>">
				<br/>
				<label for="lb_descripcion">Descripcion</label>
				<input type="text" name="in_descripcion" value="<?= $descripcion?>">
				<label for="lb_acceso">Acceso</label>
				<input type="text" name="in_acceso" value="<?= $acceso?>">
				<?php
						}
					}else{
				?>
				<label for="lb_codigo">Codigo Puesto</label>
				<input type="text" name="in_key_puesto2">
				<label for="lb_nombre">Puesto</label>
				<input type="text" name="in_nombre">
				<br/>
				<label for="lb_descripcion">Descripcion</label>
				<input type="text" name="in_descripcion">
				<label for="lb_acceso">Acceso</label>
				<input type="text" name="in_acceso">
				<?php
					}
				?>
				<br/>
				<select name="sl_cur">
					<option value=1>Crear</option>
					<option value=2>Modificar</option>
					<option value=3>Eliminar</option>
				</select>
				<input type="submit" value="Realizar">
			</form>
		</div>
		<!--INICIANDO EL BLOQUE DEL FORMULARIO-->	
	</body>
